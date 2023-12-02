<?php

namespace Modules\Base\Http\Requests\V1\Web\BaseWebRequest;

use Illuminate\Foundation\Http\FormRequest;

class BaseWebRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [];
    }
}
