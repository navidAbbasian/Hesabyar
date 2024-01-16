<?php

namespace App\Containers\AppSection\ChequeReceived\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateChequeReceivedRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-chequereceived',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'user_id',
        'person_id'
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
            'date'=>'required|date',
            'bank_name'=>'required|string',
            'branch_name'=>'required|string',
            'amount'=>'required|numeric',
            'description'=>'nullable|string',
            'cheque_image'=>'image',
            'status'=>'required',
            'person_id' => 'required|exists:persons,id,deleted_at,NULL',
            'user_id' => 'exists:users,id,deleted_at,NULL'

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
