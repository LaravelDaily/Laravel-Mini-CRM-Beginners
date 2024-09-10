<?php

namespace App\Http\Requests;

use App\Enums\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'title'       => ['required'],
            'description' => ['required'],
            'user_id'     => ['required', Rule::exists('users', 'id')],
            'client_id'   => ['required', Rule::exists('clients', 'id')],
            'deadline_at' => ['required', 'date'],
            'status'      => ['required', Rule::enum(ProjectStatus::class)],
        ];
    }
}
