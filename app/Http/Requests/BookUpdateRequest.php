<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'tituloLibro' => 'required|max:255',
            'autor' => 'required|max:255',
            'editorialLibro' => 'required|max:100',
            'versionLibro' => 'required|in:new,used',
            'codigoInternacional' => 'required|int',
            'descripcionLibro' => 'required',
            'photo' => ['required', 'image', 'max:2048'],
            'photoC' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
