<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryMovieRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT'){
            return [
                'categoryId' => ['required'],
                'movieId' => ['required'],
            ];
        }
        else {
            return [
                'categoryId' => ['sometimes','required'],
                'movieId' => ['sometimes','required'],
            ];
        }
    }
    protected function prepareForValidation() {
        $data = [
            'category_id' => $this->categoryId,
            'movie_id' => $this->movieId,
        ];

        $this->merge(array_filter($data, function ($value) {
            return !is_null($value) && $value !== '';
        }));
    }
}
