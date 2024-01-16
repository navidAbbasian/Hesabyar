<?php

namespace App\Containers\AppSection\Dashboard\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Dashboard\Data\Repositories\DashboardRepository;
use App\Containers\AppSection\Dashboard\Events\DashboardsListedEvent;
use App\Containers\AppSection\Person\Data\Repositories\PersonRepository;
use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SideCost\Data\Repositories\SideCostRepository;
use App\Containers\AppSection\SideCost\Models\SideCost;
use App\Containers\AppSection\SideIncome\Data\Repositories\SideIncomeRepository;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Carbon\Carbon;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllDashboardsTask extends ParentTask
{
    public function __construct(
        protected PersonRepository $personRepository,
        protected ProductRepository $productRepository,
        protected SellProductFactorRepository $sellProductFactorRepository,
        protected UserRepository $userRepository,
        protected SideCostRepository $sideCostRepository,
        protected SideIncomeRepository $sideIncomeRepository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $array1 = [
            'count_sellers'=> $this->userRepository->where('type', '1')->count(),    // تعداد فروشندگان
            'count_persons' => $this->personRepository->count(), // تعداد ظرف حساب ها
            'count_products' => $this->productRepository->count(),    // تعداد محصولات
            'count_sells' => $this->sellProductFactorRepository->count(),       //تعداد فروش ها
            /** نمودار کل هزینه ها */
            'side_cost' => $this->sideCostRepository->sum('amount'),    // هزینه های جانبی
            /** نمودار مل درامد ها */
            'side_income' => $this->sideIncomeRepository->sum('amount'),        //درامد جانبی
            'sell_products' => $this->sellProductFactorRepository->sum('sum_total_factor'),      //فروش محصولات


        ];

            /** نمودار رشد فروشگاه در شش ماه اخیر */
        for ($i = 0; $i < 6 ; $i++) {
            $array2[$i] = [
                "side_income_last-$i-month" => $this->sideIncomeRepository->whereBetween('created_at', [Carbon::now()->subMonths($i+1)->format('Y-m-d'), Carbon::now()->subMonths($i)->format('Y-m-d')])->count(),       //تعداد درامد جانبی در بازه زمانی
                "side_cost_last-$i-month" => $this->sideCostRepository->whereBetween('created_at', [Carbon::now()->subMonths($i+1)->format('Y-m-d'),Carbon::now()->subMonths($i)->format('Y-m-d')])->count(),           // تعداد هزینه جانبی در بازه زمانی
                "sell_products_last-$i-month" => $this->sellProductFactorRepository->whereBetween('created_at', [Carbon::now()->subMonths($i+1)->format('Y-m-d'),Carbon::now()->subMonths($i)->format('Y-m-d')])->count(),             // تعداد فروش در بازه زمانی
            ];
        }

        $result = array_merge($array1, $array2);

        DashboardsListedEvent::dispatch($result);

        return $result;
    }
}

