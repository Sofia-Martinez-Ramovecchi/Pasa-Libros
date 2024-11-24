<?php

namespace App\Http\Requests;

use App\Services\ServiceValidarOferta;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ServiceChatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            //

                 'message' => 'required|max:255',

        ];
    }
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->somethingElseIsInvalid(app(ServiceValidarOferta::class))) {
                    $validator->errors()->add(
                        'field',
                        'Has enviando un mensaje que va contra las normas de la aplicacion!'
                    );
                }
            }
        ];
    }

    private function somethingElseIsInvalid(ServiceValidarOferta $serviceChatProfanity): bool
    {
        if($serviceChatProfanity->isProfanity($this->input('message'))){
            return true;
        }else{
            return false;
        }
    }

}
