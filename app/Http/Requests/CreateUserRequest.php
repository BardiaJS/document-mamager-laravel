<?php

namespace App\Http\Requests;

use App\Rules\PersianNationalCode;
use App\Rules\PersianPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required' , 'regex:/^[A-Za-z]+$/'] ,
            'last_name' => ['required' , 'regex:/^[A-Za-z]+$/'] , 
            'national_code' => ['required' , Rule::unique('users' , 'national_code') , new PersianNationalCode],
            'password' => ['required' , 'min:6'],
            'date_of_birth' => ['required' , 'date'],
            'address' => ['required' , 'string'],
            'phone' => ['required' , new PersianPhoneNumber()],
            'email' => ['required' , Rule::unique('users' , 'email')]
        ];
    }
}
