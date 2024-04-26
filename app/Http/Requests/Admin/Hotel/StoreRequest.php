<?php

namespace App\Http\Requests\Admin\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|unique:hotel,name',
            'address'=>'required',
            'description'=>'required',
            'service'=>'required',
            'status'=>'required',
            'image'=>'required|mimes:jpg,bmp,png,jpeg',
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
            'image.required'=>'please upload your hotel image',
            'image.mimes'=>'your image must be :jpg,bmp,png,jpeg',
            'room_quantity.required'=>'please enter your hotel room quantity',
            'room_quantity.numeric'=>'your room quantity must be a number',
        ];
    }
}
