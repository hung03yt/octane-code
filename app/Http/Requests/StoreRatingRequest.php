<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatingRequest extends FormRequest
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
            'movieId' => ['required','integer'],
            'userId' => ['required','integer'],
            'rateValue' => ['required','integer','between:1,5'],
            'review' => ['string'],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'movie_id' => $this->movieId,
            'user_id' => $this->userId,
            'rate_value' => $this->rateValue
        ]);
    }
}
