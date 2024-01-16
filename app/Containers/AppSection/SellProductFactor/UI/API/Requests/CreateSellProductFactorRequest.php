<?php

namespace App\Containers\AppSection\SellProductFactor\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateSellProductFactorRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-sellproductfactor',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
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
        // 'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'factor_number' => 'numeric',
            'reverse' => 'numeric',
//            'title'=>'required|string',
            'due_date'=>'nullable|date',
            'sell_date'=>'required|date',
            'discount_type'=>'required',
            'discount'=>'required|numeric',
            'tax'=>'required|numeric',
            'description'=>'nullable|string',
            'user_id'=>'exists:users,id,deleted_at,NULL|required',
            'person_id'=>'exists:persons,id,deleted_at,NULL|required',
            'supplier_id'=>'exists:suppliers,id,deleted_at,NULL|required',
            'bank_id'=>'exists:banks,id,deleted_at,NULL|nullable'
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
