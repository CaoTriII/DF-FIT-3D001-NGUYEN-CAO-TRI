<?php

namespace App\Http\Requests\Admin\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|unique:hotel,name,'.$this->id,
            'address'=>'required',
            'description'=>'required',
            'service'=>'required',
            'status'=>'required',
            'room_quantity'=>'required|numeric',
            'room_quantity'=>'required',
        ];
    }
    public function messages(): array
    {
        return[
            'name.required'=>'Please enter Hotel name',
            'name.unique'=>'The hotel is existed',
            'address.required'=>'please enter your hotel address',
            'description.required'=>'please enter your hotel description',
            'service.required'=>'please enter your hotel service',
            'status.required'=>'please enter your hotel status',
            'room_quantity.required'=>'please enter your hotel room quantity',
            'room_quantity.numeric'=>'your room quantity must be a number',
            'room_quantity.required'=>'please enter your hotel room_quantity',
        ];
    }
}
