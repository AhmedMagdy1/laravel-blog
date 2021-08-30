<?php

namespace App\Http\Requests\SEO;

use Illuminate\Foundation\Http\FormRequest;

class CreateKeywordGroup extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'main_keyword' => 'required',
            'keywords.*.keyword' => 'required',
            'keywords.*.search_volume' => 'required',
            'keywords.*.all_in_title' => 'required',
            'keywords.*.kgr' => 'required',
        ];
    }
}
