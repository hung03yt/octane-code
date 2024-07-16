<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRatingRequest extends FormRequest
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

        if ($method == 'PUT') {
            return [
                'movieId' => ['required', 'integer'],
                'userId' => ['required', 'integer'],
                'rateValue' => ['required', 'integer'],
                'review' => ['string'],
            ];
        } else {
            return [
                'movieId' => ['sometimes', 'required', 'integer'],
                'userId' => ['sometimes', 'required', 'integer'],
                'rateValue' => ['sometimes', 'required', 'integer'],
                'review' => ['sometimes','string'],
            ];
        }
    }
    protected function prepareForValidation() {
        $data = [
            'movie_id' => $this->movieId,
            'user_id' => $this->userId,
            'rate_value' => $this->rateValue
        ];

        $this->merge(array_filter($data, function ($value) {
            return !is_null($value) && $value !== '';
        }));
    }
}
