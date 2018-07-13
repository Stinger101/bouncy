<?php
namespace App\Http\Requests\Delivery;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeliveriesRequest extends FormRequest
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
            'user' => 'required',
            'quantity'=>'required',
            'date'=>'required'
        ];
    }
}
