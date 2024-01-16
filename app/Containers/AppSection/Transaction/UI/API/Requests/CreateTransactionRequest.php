<?php

namespace App\Containers\AppSection\Transaction\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateTransactionRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => 'create-transactions',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'person_id',
        'user_id',
        'fund_id',
        'bank_id',
        'cheque_receive_id',
        'cheque_payment_id',
        'sell_product_factor_id',
        'buy_product_factor_id',
        'side_income_id',
        'side_cost_id'
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
            'amount' => 'numeric|required',
            'is_deposit' => 'required',
            'person_id' => 'exists:persons,id,deleted_at,NULL',
            'user_id' => 'exists:users,id,deleted_at,NULL',
            'bank_id' => 'exists:banks,id,deleted_at,NULL',
            'fund_id' => 'exists:funds,id,deleted_at,NULL',
            'cheque_receive_id' => 'exists:cheque_payments,id,deleted_at,NULL',
            'cheque_payment_id' => 'exists:cheque_receiveds,id,deleted_at,NULL',
            'sell_product_factor_id' => 'exists:sell_product_factors,id,deleted_at,NULL',
            'buy_product_factor_id' => 'exists:buy_product_factors,id,deleted_at,NULL',
            'side_income_id' => 'exists:side_incomes,id,deleted_at,NULL',
            'side_cost_id' => 'exists:side_costs,id,deleted_at,NULL'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.x
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
