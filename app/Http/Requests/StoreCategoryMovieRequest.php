<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryMovieRequest extends FormRequest
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
            'categoryId' => ['required'],
            'movieId' => ['required']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'category_id' => $this->categoryId,
            'movie_id' => $this->movieId,
        ]);
    }
}
