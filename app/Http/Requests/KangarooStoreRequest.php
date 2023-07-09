<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KangarooStoreRequest extends FormRequest
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
        // dd($this->id);
        return [
            'name' => [ 
                'required', 
                'alpha',
                'max:50', 
                Rule::unique('t_kangaroo_info')->ignore($this->id, 'id'),
            ],
            'nickname' => 'nullable|alpha_num|max:25',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'color' => 'nullable|alpha|max:15',
            'friendliness' => 'nullable|in:friendly,not friendly',
            'birthday' => 'required|date|before:tomorrow',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.alpha' => 'name should only contain letters',
            'name.max' => 'name must not be greater than 50 characters',
            'nickname.max' => 'nickname must not be greater than 25 characters',
            'name.required' => 'name is required',
            'gender.required' => 'gender is required',
            'height.required' => 'height is required',
            'weight.required' => 'weight is required',
            'birthday.required' => 'birthday is required',
            'birthday.data' => 'birthday is invalid'
        ];
    }
}
