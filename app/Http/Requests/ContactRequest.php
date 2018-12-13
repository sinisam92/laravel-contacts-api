<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        // return [
            
        // 'first_name' => 'required',
        // 'last_name' => 'required',
        // 'email' => $this->method('PUT') ?  'required|unique:contacts,email,' . $this->segment(3) :'required|unique:contacts,email'
        // ];
        // $contact = Contact::find($this->contacts);

        // dd($this->route()->parameters['contact']->id) ovako smo nasli id rute !!
        $contactId = $this->method() == "PUT"
            ? $this->route()->parameters['contact']->id
            : null;


            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email'      => 'required|email|unique:contacts,email' . 
                  ($contactId ? ",$contactId" : '')
                  
              ];
    // switch($this->method())
    // {
    //     case 'POST':
    //     {
    //         return [
    //           'first_name' => 'required',
    //     		'last_name' => 'required',
    //             'email'      => 'required|email|unique:contacts,email',
                
    //         ];
    //     }
    //     case 'PUT':
    //     {
    //         return [
	// 			'first_name' => 'required',
	// 			'last_name' => 'required',
	// 			'email'   => 'required|email|unique:contacts,email,'. $this->segment(3),
              
    //         ];
    //     }
    //     default:break;
    // }
    }
}
