<?php

namespace Database\Factories;

use App\Models\Intervenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntervenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Intervenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_demande' => fake()->name(),
            'date_creation'=>fake()->date(),
            'date_modification'=>fake()->date(),
            'description'=>fake()->sentence(),
            'N_ticket',
            'priorite',
            'matricule_employe',
            'matricule_intervenant',  
            'description_resolution',
            'etat',
        ];
    }
}
