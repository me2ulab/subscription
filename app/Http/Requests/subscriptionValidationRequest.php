<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subscriptionValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'integer|required',
            'website_id' => 'integer|required',
            'plan_id' => 'integer|requred'
        ];
    }
    public function getAttributes()
    {
        return $this->validated();
    }
}
