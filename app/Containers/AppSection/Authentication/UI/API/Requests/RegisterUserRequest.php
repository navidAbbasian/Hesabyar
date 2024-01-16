<?php

namespace App\Containers\AppSection\Authentication\UI\API\Requests;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-users',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
        'parent_id'
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [

    ];

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'parent_id'=>'exists:users,id',
            'commission'=>'numeric|required_if:type,1',
            'sub_commission'=>'numeric|nullable',
            'description'=>'nullable|string',
            'type' => 'required|numeric',
            'password' => [
                'required',
                User::getPasswordValidationRules(),
            ],
            'name' => 'min:2|max:50',
            'image'=>'image',
            'gender' => 'in:male,female,unspecified',
            'birth' => 'date',
            /*'verification_url' => [
                'url',
                Rule::requiredIf(function () {
                    return config('appSection-authentication.require_email_verification');
                }),
                Rule::in(config('appSection-authentication.allowed-verify-email-urls')),
            ],*/
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
