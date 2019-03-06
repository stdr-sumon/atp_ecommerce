<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest {
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
			'name' => 'bail|required',
			'buying_price' => 'bail|required|numeric',
			'selling_price' => 'bail|required|numeric',
			'quantity' => 'bail|required|numeric',
			'description' => 'bail|required|alpha_num',
			'category' => 'bail|required',
		];
	}
}
