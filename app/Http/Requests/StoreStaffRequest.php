<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
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
        return [
            'emp_name' => 'required',
            'emp_no' => 'required|max:11',
            'emp_email' => 'required|unique:staff,emp_email',
            'emp_address' => 'required|max:100',
            'emp_city' => 'required',
            'emp_state' => 'required',
            'emp_country' => 'required',
            'emp_department' => 'required',
            'emp_join_date' => 'required',
            'emp_join_date' => 'required',
            'emp_contract_period' => 'required',
            'emp_sallery' => 'required',
        ];
    }
}
