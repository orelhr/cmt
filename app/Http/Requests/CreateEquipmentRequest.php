<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEquipmentRequest extends Request {

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
			//
            'name'=> 'required|min:3',
            'branch'=>'required',
            'model'=> 'required',
            'validity'=>'required',
            'provider_name'=>'required',
            'provider_phone'=>'required|min:10',
            'purchase_date'=>'required|date',
            'serie'=>'required',
            'description'=>'required',
            'comments'=>'required'
		];
	}

}
