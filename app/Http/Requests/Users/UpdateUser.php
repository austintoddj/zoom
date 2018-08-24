<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\RequestAbstract;

class UpdateUser extends RequestAbstract
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
            'email'    => 'required|email|unique:users,email,' . $this->user,
            'password' => isset($this->password) ? 'string|min:6|confirmed' : '',
        ];
    }
}