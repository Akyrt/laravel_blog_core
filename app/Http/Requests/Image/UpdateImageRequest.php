<?php

namespace App\Http\Requests;

class UpdateImageRequest extends StoreImageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => 'url|image',
            'type' => 'in:THUMBNAIL,IMAGE',
            'post_id' => 'exists:posts,id'
        ];
    }
}
