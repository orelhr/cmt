<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PerfilUpdateRequest extends Request {

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
		return [

            'name' => 'required',
            'lastname'=>'required',
            'second_lastname' => 'required',
           // 'picture_url' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'cmt_email' => 'required',
            'ife' => 'required',
            'curp' => 'required',
            'rfc' => 'required',
            'birthdate' => 'required',
            'sexo' => 'required',
            'civil_status' => 'required',
           // 'occupation' => 'required',
            'emergency_phone'=> 'required',
            'blood_type' => 'required'

			];
	}

}
