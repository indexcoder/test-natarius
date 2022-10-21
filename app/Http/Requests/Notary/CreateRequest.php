<?php
namespace App\Http\Requests\Notary;

use App\Models\Notary;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'receipt_date' => 'required|string',
            'record_type' => ['required', 'string', Rule::in(Notary::recordsList())],
        ];
    }
}
