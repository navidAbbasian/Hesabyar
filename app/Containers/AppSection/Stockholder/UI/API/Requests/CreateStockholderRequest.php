<?php

namespace App\Containers\AppSection\Stockholder\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateStockholderRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-stockholder',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
         'company_id',
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
            'name'=> 'required|string',
            'family' => 'required|string',
            'image'=>'image',
            'company_id' => 'numeric',
            'alias' => 'string',
            'national_id' => 'numeric',
            'economic_code'=> 'numeric',
            'registration_number' =>'numeric',
            'description' => 'nullable|string',
            'country' =>'required|string',
            'province'=>'required|string',
            'city'=>'required|string',
            'address'=>'required|string',
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
