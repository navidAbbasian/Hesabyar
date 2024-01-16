<?php

namespace App\Containers\AppSection\FinancialReport\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ChequePayment\Data\Repositories\ChequePaymentRepository;
use App\Containers\AppSection\ChequeReceived\Data\Repositories\ChequeReceivedRepository;
use App\Containers\AppSection\FinancialReport\Data\Repositories\FinancialReportRepository;
use App\Containers\AppSection\FinancialReport\Events\FinancialReportsListedEvent;
use App\Containers\AppSection\Fund\Data\Repositories\FundRepository;
use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\SellProductFactor\Data\Repositories\SellProductFactorRepository;
use App\Containers\AppSection\SideCost\Data\Repositories\SideCostRepository;
use App\Containers\AppSection\SideIncome\Data\Repositories\SideIncomeRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllFinancialReportsTask extends ParentTask
{
    public function __construct(
        protected FundRepository $fundRepository,
        protected SideIncomeRepository $sideIncomeRepository,
        protected SideCostRepository $sideCostRepository,
        protected ChequeReceivedRepository $chequeReceivedRepository,
        protected ChequePaymentRepository $chequePaymentRepository,
        protected ProductRepository $productRepository,
        protected SellProductFactorRepository $sellProductFactorRepository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run()
    {

        $result = [
            /** دارایی ها و درامد ها */
            'sum_fund_inventory' => $this->fundRepository->sum('inventory'), // موجودی صندوق
            'sum_side_income_amount' => $this->sideIncomeRepository->sum('amount'), //درامدد های جانبی
            'sum_received_cheque_amount' => $this->chequeReceivedRepository->sum('amount'),     //چک های دریافتی
            'sum_products_sale_price' => $this->productRepository->sum('buy_price'),        //موجودی محصولات
            'sum_sell_product_profits' => $this->sellProductFactorRepository->sum('Profit'),    //سود فروش محصولات
            'sum_sell_product_factors' => $this->sellProductFactorRepository->sum('sum_total_factor'),      // کل فروش محصولات
            'sum_sell_product_factors_tax' => $this->sellProductFactorRepository->sum('tax'),       //مالیات دریافتی
            /** هزینه ها و بدهی ها */
            'debt_sum_side_cost_amount' => $this->sideCostRepository->sum('amount'),         //هزینه های جانبی
            'debt_sum_payment_cheque_amount' => $this->chequePaymentRepository->sum('amount')       //چک های پرداختی
        ];
        FinancialReportsListedEvent::dispatch($result);

        return $result;
    }
}
