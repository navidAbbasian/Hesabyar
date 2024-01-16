<?php

namespace App\Containers\AppSection\BuyProductFactor\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateBuyProductFactorRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-buyproductfactor',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'person_id',
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
            'reverse'=>'numeric',
//            'title'=>'string|required',
            'date'=>'required|date',
            'discount_type'=>'string|required',
            'discount'=>'numeric|required',
            'tax'=>'numeric|required',
            'description'=>'nullable|string',
            'person_id'=>'exists:persons,id,deleted_at,NULL|required'

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
