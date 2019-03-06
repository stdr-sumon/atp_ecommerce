<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegistrationRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'bail|required|alpha',
			'email' => 'bail|required|email',
			'phone' => 'bail|required|numeric',
			'address' => 'bail|required',
			'designation' => 'bail|required',
			'dob' => 'bail|required',
			'password' => 'bail|required',
			'confirmPassword' => 'bail|required|same:password',
			'username' => 'bail|required|alpha|unique:username,login',
		];
	}
}
