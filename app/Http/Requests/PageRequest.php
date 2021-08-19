<?php

namespace App\Http\Requests;

use App\Models\Page;
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        __sanitize('title');
        __sanitize('excerpt');
        __sanitize('meta_description');

        $this->merge(['slug' => Page::slugify(Str::slug((string)$this->input('slug')))]);

        return [
            "title" => ["required", "min:2", "max:255", "string"],
            "status" => ["required", "string", "in:published,pending"],
            "type" => ["required", "string", "in:post,page"],
            "slug" => ["required", "min:2", "max:255", "regex:![a-z0-9_\-]+!", "string", 'unique:pages,slug'],
            "tags" => ["nullable", "sometimes", 'array'],
            "tags.*" => ["required", "min:1", "max:50", "string"],
            "content" => ["nullable", "sometimes", "max:65535", "string"],
            "feature_photo" => ['url', "nullable", "sometimes", 'max:2048', 'string'],
            "excerpt" => ["nullable", "sometimes", "max:300", "string"],
            "meta_description" => ["nullable", "sometimes", "max:200", "string"],
            "categories" => ["nullable", "sometimes", 'array'],
            "categories.*" => ["sometimes", "nullable", "min:1", "integer", 'exists:categories,id'],
            "parent" => ["nullable", "sometimes", 'integer', 'min:1', 'exists:posts,id'],
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
