<?php

namespace App\Http\Requests\Resources\Users;

use App\Http\Requests\RequestAbstract;

class StoreUser extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'email'    => 'unique:users|required|email',
            'password' => 'string|min:6|confirmed',
        ];
    }
}
