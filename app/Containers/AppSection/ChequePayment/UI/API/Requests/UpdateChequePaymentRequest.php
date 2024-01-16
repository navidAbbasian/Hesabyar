<?php

namespace App\Containers\AppSection\ChequePayment\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class UpdateChequePaymentRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'update-chequepayment',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
        'person_id'
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
            'date'=>'date',
            'bank_name'=>'string',
            'branch_name'=>'string',
            'amount'=>'numeric',
            'description'=>'nullable|string',
//            'status'=>'required',
            'person_id'=>'exists:persons,id,deleted_at,NULL'
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
