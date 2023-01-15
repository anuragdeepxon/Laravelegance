<?php

namespace App\Http\Requests\Employer;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            'is_candidate_accept' => 'boolean',
            'is_employer_accept' => 'boolean',
            'candidate_accepted_at' => 'nullable|date',
            'employer_accepted_at' => 'nullable|date',
            'status' => 'string|in:IN REVIEW,ACTIVE,INACTIVE',
            'company_name' => 'string',
            'address' => 'string',
            'position' => 'string',
            'phone_one' => 'string',
            'phone_two' => 'string',

            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
        ];
    }
}
