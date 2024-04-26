<?php

namespace App\Http\Requests\Admin\Room;

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
            'name'=>'required|unique:room,name,' .$this->id,
            'price'=>'required|numeric',
            'description'=>'required',
            'content'=>'required',
            'status'=>'required',
            'featured'=>'required',
            'room_quantity_status'=>'required|numeric',
            'room_quantity'=>'required|numeric',
        ];
    }
    public function message(): array
    {
        return [
            'name.required'=>'Please enter your room name',
            'name.unique'=>'room name is existed',
            'price.required'=>'please enter your room price',
            'price.numeric'=>'price must be a number',
            'description.required'=>'please enter your room description',
            'content.required'=>'please enter your room content',
            'status.required'=>'please enter your room status',
            'featured.required'=>'please enter your room featured',
            'room_quantity_status.required'=>'please enter your room_quantity_status',
            'room_quantity_status.numeric'=>'your room quantity must be a number',
            'room_quantity.required'=>'please enter your room quantity',
            'room_quantity.numeric'=>'your room quantity must be a number',
        ];
    }
}
