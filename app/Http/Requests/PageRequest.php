<?php

namespace App\Http\Requests;

use App\Libraries\GeneralRegex;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PageRequest extends FormRequest
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
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData()
    {
        __sanitize('title');

        __sanitize('excerpt');

        __sanitize('meta_description');

        $this->merge(['slug' => Str::slug((string)$this->input('slug', ''))]);

        return $this->all();
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => ["required", "min:2", "max:255", "string"],
            "status" => ["required", "string", "in:published,pending"],
            "type" => ["required", "string", "in:post,page"],
            "slug" => ["required", "min:2", "max:255", "string"],
            "tags" => ["nullable", "sometimes", 'string', 'regex:' . GeneralRegex::tagsRegex()],
            "content" => ["nullable", "sometimes", "max:65535", "string"],
            "feature_photo" => ['url', "nullable", "sometimes", 'max:2048', 'string'],
            "excerpt" => ["nullable", "sometimes", "max:300", "string"],
            "meta_description" => ["nullable", "sometimes", "max:200", "string"],
            "categories" => ["sometimes", "nullable", 'array'],
            "categories.*" => ["sometimes", "nullable", "min:1", "integer", 'exists:categories,id'],
            "parent" => ["sometimes", "nullable", 'integer', 'min:1', 'exists:pages,id'],
            "page_id" => ['required', 'integer', 'min:1', 'exists:pages,id'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'title' => 'عنوان نوشته',
            'status' => 'وضعیت انتشار',
            'type' => 'نوع نوشته',
            'slug' => 'عنوان انگلیسی',
            'tags' => 'برچسب ها',
            'categories' => 'دسته بندی ها',
            'content' => 'محتوای نوشته',
            'parent' => 'نوشته والد',
            'feature_photo' => 'تصویر شاخص',
            'excerpt' => 'خلاصه متن',
            'meta_description' => 'توضیحات متا',
            'post_id' => 'شناسه پست',
        ];
    }


}
