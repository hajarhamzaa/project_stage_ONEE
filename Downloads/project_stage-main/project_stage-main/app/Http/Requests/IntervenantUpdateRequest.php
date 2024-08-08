<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntervenantUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Or implement your authorization logic here
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_demande' => 'required',
            'priorite' => 'required',
            'matricule_intervenant' => 'required',
            'description_resolution' => '',
            'date_modification' => 'date',
            'installation_logiciel' => 'sometimes|boolean',
            'creation_compte' => 'sometimes|boolean',
            'serveur' => 'sometimes|boolean',
            'depannage_materiles' => 'sometimes|boolean',
            'instalation_ordinateur' => 'sometimes|boolean',
            'probleme_acces_a_internet' => 'sometimes|boolean',
            'probleme_acces_au_vpn' => 'sometimes|boolean',
            'probleme_mot_de_passe' => 'sometimes|boolean',
            'probleme_mot_de_passe_confirmation' => 'sometimes|boolean',
            'imprimante' => 'sometimes|boolean',
            'bi' => 'sometimes|boolean',
            'creation_nouvelle_solution_informatique' => 'sometimes|boolean',
            'mise_a_jours_solution_informatique_existante' => 'sometimes|boolean',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'installation_logiciel' => $this->input('installation_logiciel') ? 1 : 0,
            'creation_compte' => $this->input('creation_compte') ? 1 : 0,
            'serveur' => $this->input('serveur') ? 1 : 0,
            'depannage_materiles' => $this->input('depannage_materiles') ? 1 : 0,
            'instalation_ordinateur' => $this->input('instalation_ordinateur') ? 1 : 0,
            'probleme_acces_a_internet' => $this->input('probleme_acces_a_internet') ? 1 : 0,
            'probleme_acces_au_vpn' => $this->input('probleme_acces_au_vpn') ? 1 : 0,
            'probleme_mot_de_passe' => $this->input('probleme_mot_de_passe') ? 1 : 0,
            'probleme_mot_de_passe_confirmation' => $this->input('probleme_mot_de_passe_confirmation') ? 1 : 0,
            'imprimante' => $this->input('imprimante') ? 1 : 0,
            'bi' => $this->input('bi') ? 1 : 0,
            'creation_nouvelle_solution_informatique' => $this->input('creation_nouvelle_solution_informatique') ? 1 : 0,
            'mise_a_jours_solution_informatique_existante' => $this->input('mise_a_jours_solution_informatique_existante') ? 1 : 0,
        ]);
    }
}