<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
        return [
            'hostel_id'=>'required',
            'capacity'=>'required',
            'status' => 'required',
            'fan' => 'required',
            'ac' => 'required',
            'furnished' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'hostel_id.required'=>'Please Select Hostel',
            'capacity.required'=>'Enter Room Capacity',
            'status.required' => 'Enter Room Status',
            'fan.required' => 'Enter Fan Status',
            'ac.required' => 'Enter AC Status',
            'furnished.required' => 'Enter Furnished Status',
        ];
    }
}
