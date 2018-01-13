<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotosRequest extends FormRequest
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
        switch($this->method()) {
            case 'PATCH':
            {
                return [
                    'brand' => 'required',
                    'model' => 'required',
                    'price' => 'required',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'released_on' => 'required',
                ];
            }
            default:
            {
                return [
                    'brand' => 'required',
                    'model' => 'required',
                    'price' => 'required',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'photo_id' => 'required',
                    'icon_id' => 'required',
                    'released_on' => 'required',
                ];
            }
        }
    }
}
