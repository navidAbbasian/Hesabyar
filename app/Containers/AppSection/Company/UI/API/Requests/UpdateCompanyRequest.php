<?php

namespace App\Containers\AppSection\Company\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateCompanyRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'update-companies',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
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
            'name'=>'string',
            'logo'=>'Image',
            'registration_number'=>'numeric',
            'country'=>'string',
            'province'=>'string',
            'city'=>'string',
            'phone'=>'numeric',
            'email'=>'nullable|email',
            'website'=>'nullable|string',
            'national_id' => 'numeric',
            'economic_code'=> 'numeric',
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
