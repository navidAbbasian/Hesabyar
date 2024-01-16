<?php

namespace App\Containers\AppSection\Person\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdatePersonRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'update-persons',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
        'person_category_id',
        'company_id',
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
            'image'=>'image',
            'family' => 'string',
            'description' => 'nullable|string',
            'country' =>'string|nullable',
            'province'=>'string|nullable',
            'city'=>'string|nullable',
            'address'=>'nullable|string',
            'postal_code'=>'nullable|numeric',
            'phone_number'=>'nullable|numeric',
            'telephone_number'=>'nullable|numeric',
            'fax_number'=>'nullable|numeric',
            'email'=>'nullable|email',
            'website'=>'nullable|string',
            'person_category_id'=>'exists:person_categories,id,deleted_at,NULL',
            'company_id'=>'exists:companies,id,deleted_at,NULL'
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
