<?php

namespace App\Containers\AppSection\SideCost\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateSideCostRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'update-sidecost',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
        'side_cost_category_id',
        'person_id',
        'bank_id',
        'fund_id',
        'user_id'
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
            'payment_method' => 'numeric',
            'type'=>'required|numeric',
            'title'=>'required|string',
            'amount'=>'required|numeric',
            'date'=>'string|required',
            'side_cost_category_id' => 'exists:side_cost_categories,id,deleted_at,NULL|required|numeric',
            'bank_id'=>'exists:banks,id,deleted_at,NULL|required_if:type,1',
            'fund_id'=>'required_if:type,2|exists:funds,id,deleted_at,NULL',
            'person_id'=>'exists:persons,id,deleted_at,NULL|required',
            'user_id'=>'exists:users,id,deleted_at,NULL',
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
