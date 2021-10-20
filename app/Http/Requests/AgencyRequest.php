<?php

namespace App\Http\Requests;

use App\Http\Requests\ParentRequest;

class AgencyRequest extends ParentRequest
{
    /**
     * Force response json type when validation fails
     * @var bool
     */

    protected $forceJsonResponse = true;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();
    }

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
        $rules = [
            'name' => ["required"],
            'logo' => ["image", "mimes:jpeg,png,jpg,gif,svg", "max:1048"],
        ];

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans("message.required"),
        ];
    }
}
