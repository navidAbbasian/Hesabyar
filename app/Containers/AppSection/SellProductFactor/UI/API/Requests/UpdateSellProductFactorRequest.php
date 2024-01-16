<?php

namespace App\Containers\AppSection\SellProductFactor\UI\API\Requests;

use App\Containers\AppSection\SellProductFactor\Traits\IsResourceOwnerTrait;
use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateSellProductFactorRequest extends ParentRequest
{
    use IsResourceOwnerTrait;

    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'update-sellproductfactor',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
        'user_id',
        'person_id',
        'supplier_id',
        'bank_id',
        'products.*.product_id'
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'factor_number' => 'numeric',
            'reverse' => 'numeric',
//            'title'=>'string',
            'due_date' => 'date',
            'sell_date' => 'date',
//            'discount_type'=>'required',
            'discount' => 'numeric',
            'tax' => 'numeric',
            'description' => 'nullable|string',
            'sum_total_factor' => 'numeric',
            'user_id' => 'exists:users,id,deleted_at,NULL',
            'seller_id' => 'exists:sellers,id,deleted_at,NULL',
            'supplier_id' => 'exists:suppliers,id,deleted_at,NULL',
            'bank_id' => 'exists:banks,id,deleted_at,NULL|nullable',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
            'isResourceOwner'

        ]);
    }
}
