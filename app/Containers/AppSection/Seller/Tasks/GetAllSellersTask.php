<?php

namespace App\Containers\AppSection\Seller\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Http\Request;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllSellersTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    )
    {
    }


    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($request, bool $skipPagination = false): mixed
    {
        $repository = $this->addRequestCriteria()->repository->where('type', '1')->withTrashed();
        if ($request->only('seller')) {
            $seller = $request->decode($request->get('seller'));
            $repository = $repository->where('id', '!=' , $seller);
        }


        return $skipPagination ? $repository->get() : $repository->paginate(env("PAGINATION_LIMIT_DEFAULT"));
    }
}
