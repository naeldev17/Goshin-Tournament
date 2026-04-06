<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateCompetitionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'location' => ['required', 'string', 'max:255'],
        'date' => ['required', 'date_format:Y-m-d']
    ];
}
}
