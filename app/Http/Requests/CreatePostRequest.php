<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\assertNotTrue;

class CreatePostRequest extends FormRequest
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
            'name' => ['required', 'max:225'],
            'description' => 'max:225',
            'category' => 'required',
            'user_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => __('message.error.missing_name'),
            'name.max'          => __('message.error.oversize_name'),
            'description.max'   => __('message.error.oversize_desc'),
            'category.required' => __('message.error.missing_category'),
            'user_id'           => __('message.error.missing_user_id')
        ];
    }
}
