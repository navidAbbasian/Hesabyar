<?php

namespace App\Containers\AppSection\Product\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateProductRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-products',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
         'product_category_id',
         'unit_id',
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
            'name'=>'required|string',
            'code'=>'required|numeric',
            'image'=>'image',
            'status'=>'required',
            'quantity'=>'required|numeric',
            'description'=>'nullable|string',
            'type' => 'numeric',
            'total_working_hours'=>'required_if:type,1|numeric',
            'direct_working_rate'=>'required_if:type,1|numeric',
            'continuous_material_rate'=>'required_if:type,1|numeric',
            'total_materials_used'=>'required_if:type,1|numeric',
            'indirect_cost_of_work'=>'required_if:type,1|numeric',
            'indirect_cost_of_material'=>'required_if:type,1|numeric',
            'other_costs'=>'required_if:type,1|numeric',
            'buy_price'=>'required_if:type,0|numeric',
            'sale_price'=>'required|numeric',
            'product_category_id' => 'exists:product_categories,id,deleted_at,NULL|required',
            'unit_id' => 'required|exists:units,id,deleted_at,NULL'
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
