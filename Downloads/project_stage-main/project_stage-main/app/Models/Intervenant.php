<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'type_demande',
        'date_creation',
        'date_modification',
        'description',
        'N_ticket',
        'priorite',
        'matricule_employe',
        'matricule_intervenant',  
        'description_resolution',
        'etat',
        'installation_logiciel',
        'creation_compte',
        'serveur',
        'depannage_materiles',
        'instalation_ordinateur',
        'probleme_acces_a_internet',
        'probleme_acces_au_vpn',
        'probleme_mot_de_passe',
        'probleme_mot_de_passe_confirmation',
        'imprimante',
        'bi',
        'creation_nouvelle_solution_informatique',
        'mise_a_jours_solution_informatique_existante',
        
    ];

    protected static function booted()
    {
        static::creating(function ($intervenant) {
            $intervenant->date_modification = now();
        });
        static::creating(function ($intervenant) {
            $intervenant->matricule_intervenant = 'Do it';
        });
        static::creating(function ($intervenant) {
            $intervenant->description_resolution = 'Votre descri';
        });
    }

    protected $dates = ['deleted_at'];

    protected $casts = [
        'installation_logiciel' => 'integer',
        'creation_compte'  => 'integer',
        'serveur'  => 'integer',
        'depannage_materiles'  => 'integer',
        'instalation_ordinateur'  => 'integer',
        'probleme_acces_a_internet'  => 'integer',
        'probleme_acces_au_vpn'  => 'integer',
        'probleme_mot_de_passe'  => 'integer',
        'probleme_mot_de_passe_confirmation'  => 'integer',
        'imprimante'  => 'integer',
        'bi'  => 'integer',
        'creation_nouvelle_solution_informatique'  => 'integer',
        'mise_a_jours_solution_informatique_existante'  => 'integer',
    ];
    // public function setDescriptionAttribute($value)
    // {
    //     $this->attributes['description'] = $value ?: '';
    // }
    // Méthode pour récupérer tous les intervenants
    public function getAllIntervenants()
    {
        return Intervenant::all();
    }

    // Méthode pour récupérer un intervenant par son ID
    public function getIntervenantById($id)
    {
        return Intervenant::find($id);
    }

    // Autres méthodes pour récupérer des intervenants en fonction de critères spécifiques
}
