<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => ['nullable', 'regex:/^[\pL\s]+$/u', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'phone' => [
                'nullable',
                'regex:/^(0|\+84)[1-9][0-9]{8,10}$/' // Điều chỉnh để cho phép 9-11 chữ số
            ],
            'address' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'in:user,admin'],
            'image' => [
                'nullable', // Cho phép trường này là rỗng (không bắt buộc)
                'image', // Kiểm tra tệp có phải là ảnh không
                'mimes:jpeg,png,jpg,gif', // Kiểm tra định dạng tệp ảnh (JPEG, PNG, JPG, GIF)
                'max:2048' // Giới hạn kích thước tệp tối đa là 2MB
            ],
        ];
    }



    /**
     * Get the validation messages.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.regex' => 'Tên không được có kí tự đặc biệt hoặc số.',
            'name.max' => 'Tên không được vượt quá 255 kí tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 kí tự.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Vui lòng nhập số bắt đầu bằng 0 hoặc +84 và có 9-10 chữ số.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 kí tự.',
            'role.in' => 'Vai trò phải là một trong hai giá trị: user hoặc admin.',
            'image.string' => 'URL hình ảnh phải là một chuỗi ký tự hợp lệ.',
        ];
    }
}
