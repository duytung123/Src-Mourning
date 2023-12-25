<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MourningRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            "entrant" => "required",
//            "entrant_employee_no" => "integer|max:9999999999",
//            "entrant_name" => "string|max:100",
//            "entrant_kana" => "string|max:100",
//            "related_employee_no" => "required|integer|max:9999999999",
//            "related_name" => "required|string|max:100",
//            "related_kana" => "required|string|max:100",
//            "classification" => "required|integer|max:100",
//            "company" => "required|integer|max:50",
//            "member1" => "required|string|max:100",
//            "member2" => "required|string|max:100",
//            "passed_away_name" => "required|string|max:100",
//            "passed_away_kana" => "required|string|max:100",
//            "passed_away_date" => "required|string",
        ];
    }
}
