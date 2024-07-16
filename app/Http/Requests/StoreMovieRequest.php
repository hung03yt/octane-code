<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMovieRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'director' => ['required', 'string'],
            'releaseDate' => ['required', 'date'],
            'synopsis'=> ['required', 'string'],
            'imgPath'=> ['required', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'release_date' => $this->releaseDate,
            'img_path' => $this->imgPath,
        ]);
    }
}
