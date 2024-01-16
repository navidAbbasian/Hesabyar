<?php

namespace App\Containers\AppSection\Supplier\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateSupplierRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-supplier',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        // 'id',
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
            'logo'=>'Image',
            'registration_number'=>'numeric|required',
            'country'=>'required|string',
            'province'=>'required|string',
            'city'=>'required|string',
            'phone'=>'nullable|numeric',
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
