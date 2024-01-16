<?php

namespace App\Containers\AppSection\Stockholder\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateStockholderRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'update-stockholder',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
        'company_id'
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
            'name'=> 'string',
            'family' => 'string',
            'image'=>'image',
            'company_id' => 'numeric',
            'alias' => 'string',
            'national_id' => 'numeric',
            'economic_code'=> 'numeric',
            'registration_number' =>'numeric',
            'description' => 'nullable|string',
            'country' =>'string',
            'province'=>'string',
            'city'=>'string',
            'address'=>'string',
            'postal_code'=>'nullable|numeric',
            'phone_number'=>'nullable|numeric',
            'telephone_number'=>'nullable|numeric',
            'fax_number'=>'nullable|numeric',
            'email'=>'nullable|email',
            'website'=>'nullable|string'
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
