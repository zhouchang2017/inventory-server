<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class BrandRequest extends FormRequest
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

        // store => post

        switch ($this->getMethod()) {
            case Request::METHOD_POST:
                return $this->postRule();
            default:
                return [];
        }
    }

    private function postRule()
    {
        return [
            'name'        => 'required|unique:brands|max:255',
            'avatar'      => 'nullable',
            'description' => 'nullable',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => '缺少品牌名称',
            'name.unique'   => '该品牌名称已存在',
            'name.max'      => '品牌名称长度溢出',
        ];
    }
}
