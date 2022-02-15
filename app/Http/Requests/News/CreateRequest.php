<?php

namespace App\Http\Requests\News;

use App\Models\Categories;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        return [
            'news_title' => ['required', 'string', 'min:3'],
            'is_visible' => ['required', 'integer', 'between:0,1'],
            'news_content' => ['required', 'string', 'min:10', 'max:500'],
            'categories' => ['required', 'exists:news_categories,id'],
            'image' => ['nullable','file','image']
        ];
    }

    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }

    public function attributes()
    {
        return [
            'news_title' => '\'Заголовок новости\'',
            'is_visible' => '\'Отображать новость или нет\'',
            'categories' => '\'Категория\'',
            'news_content'=>'\'Содержание новости\''
        ];
    }
}
