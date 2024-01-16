<?php

namespace App\Containers\AppSection\Bank\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateBankRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-banks',
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
            'name' =>'required|string',
            'branch' => 'string|required',
            'pos_number' => 'numeric',
            'shaba_number' => 'numeric|required',
            'account_number' => 'numeric|required',
            'cart_number' => 'numeric|required',
            'account_owner' => 'string|required',
            'status' => 'numeric',
            'description' => 'nullable|string',
            'inventory' => 'numeric',
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
