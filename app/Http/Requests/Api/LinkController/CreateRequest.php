<?php

namespace App\Http\Requests\Api\LinkController;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $url
 * @property string $slug
 * @property ?string $expires_at
 */
class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => [
                'string',
                'required', 
                function(string $attribute, mixed $value, \Closure $fail) {
                    if (! filter_var($value, FILTER_VALIDATE_URL)) {
                        $fail('invalid url');
                    }
                },
            ],
            'slug' => sprintf('string|required|regex:/^[a-zA-Z0-9]+$/|unique:links|min:3|max:%d', config('links.max_slug_length')),
            'expires_at' => 'date_format:d.m.Y H:i|nullable',
        ];
    }
}
