<?php
// PdfGenerateRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class PdfGenerateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            //
        //     'name_sei' => 'required|max:255',
        //     'name_mei' => 'required|max:255',
        //     'address' => 'required|max:255',
        //     'school_name' => 'required|max:255',
        //     'company_name' => 'required|max:255',
        //     'preferred_datetime_1' => [
        //     'required',
        //     'date',
        //     'after_or_equal:today',
        //     'unique:table_name,column_name',
        // ],
        // 'preferred_datetime_2' => [
        //     'required',
        //     'date',
        //     'after_or_equal:today',
        //     'unique:table_name,column_name',
        // ],
        // 'preferred_datetime_3' => [
        //     'required',
        //     'date',
        //     'after_or_equal:today',
        //     'unique:table_name,column_name',
        // ],
        //  'preferred_class_format' => 'required|in:オンライン,対面,どちらでも',
        ];
    }
}
