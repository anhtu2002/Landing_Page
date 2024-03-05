<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePostRequest extends FormRequest
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
            //
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|email|max:255',
            'phone' => 'bail|required|digits:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'name.max' => 'Tên không được vượt quá :max ký tự',

            'email.required' => 'Vui lòng nhập email của bạn',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email không được vượt quá :max ký tự',

            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Số điện thoại không đúng',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->toArray();
        return redirect()->back()->with('message', reset($errors)[0]);
    }
}
