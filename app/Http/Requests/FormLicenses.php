<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormLicenses extends FormRequest
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
        $this->sanitize();

        switch ($this->method()) {
            case "GET":
            case "DELETE":
                return [];
                break;

            case "POST":
                return [
                    'license_number'  => 'required|unique:licenses',
                    'expiration_date' => 'required|date',
                ];
                break;

            case "PUT":
            case "PATCH":
                return [
                    'license_number'  => 'required',
                    'expiration_date' => 'required|date',
                ];
                break;

            default:
                break;
        }
    }

    /**
     * Sanitize input fields
     *
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['license_number']  = filter_var($input['license_number'], FILTER_SANITIZE_STRING);
        $input['expiration_date'] = filter_var($input['expiration_date'], FILTER_SANITIZE_STRING);

        $this->replace($input);
    }
}
