<?php

namespace App\Http\Requests\Clients\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // lấy ra phương thức cần sử lý
        $currentMethod = $this->route()->getActionMethod();
        switch ($this->method()) { // $this->method() kiểm tra xem phương thức submit là phương thức gì
            case 'POST':
                switch ($currentMethod) {
                    case 'login':
                        $rules = [
                            'name' => 'required|min:5|',
                            'email' => 'required|email',
                            'password' => 'required|min:3',
                            'password_confirm' => 'required|same:password|min:3'
                        ];
                        break;
                    case 'register':
                        $rules = [
                            'name' => 'required|min:5|',
                            'email' => 'required|unique:users|email',
                            'password' => 'required|min:3',
                            'password_confirm' => 'required|same:password|min:3'
                        ];
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            default:
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute tối thiểu :min ký tự',
            'unique' => ':attribute đã tồn tại, vui lòng thử lại',
            'email' => ':attribute không đúng định dạng',
            'same' => ':attribute không khớp , vui lòng thử lại',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ và tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirm' => 'Mật khẩu xác nhận'
        ];
    }
}
