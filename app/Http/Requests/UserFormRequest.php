<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UserFormRequest extends FormRequest
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
        $rules = [
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6,max:16',
        ];

        $route = Route::getCurrentRoute();
        if ($route->getName() == 'sekretare.student.update' || $route->getName() == 'sekretare.pedagog.update') {
            $userId = $route->parameters['id'];
            $rules['email'] = 'required|unique:users,email,' . $userId;
            $rules['password'] = 'min:6,max:16,' . $userId;
        }

        return $rules;
    }
}
