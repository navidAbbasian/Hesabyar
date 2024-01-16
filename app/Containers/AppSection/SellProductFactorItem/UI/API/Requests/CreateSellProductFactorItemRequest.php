<?php

namespace App\Containers\AppSection\SellProductFactorItem\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateSellProductFactorItemRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'product_id',
        'factor_id'
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        // 'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'number'=>'required|numeric',
            'unit_amount'=>'required|numeric',
            'product_id'=>'exists:products,id',
            'factor_id'=>'exists:sell_product_factors,id'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
