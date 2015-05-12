<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AutoRequest extends Request {

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
            'branch'=>'required',
            'model'=>'required',
            'serie'=>'required',
            'plates'=>'required',
            'engine_number'=>'required',
            'accessories'=>'required',
            'type'=>'required',
            'details'=>'required'
		];
	}

}
