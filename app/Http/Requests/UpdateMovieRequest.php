<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
                'name' => ['required'],
                'director' => ['required'],
                'releaseDate' => ['required'],
                'synopsis' => ['required'],
                'imgPath' => ['required'],
            ];
        }
        else {
            return [
                'name' => ['sometimes','required'],
                'director' => ['sometimes','required'],
                'releaseDate' => ['sometimes','required'],
                'synopsis' => ['sometimes','required'],
                'imgPath' => ['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation() {
        $data = [
            'release_date' => $this->releaseDate,
            'img_path' => $this->imgPath,
        ];

        $this->merge(array_filter($data, function ($value) {
            return !is_null($value) && $value !== '';
        }));
    }
}
