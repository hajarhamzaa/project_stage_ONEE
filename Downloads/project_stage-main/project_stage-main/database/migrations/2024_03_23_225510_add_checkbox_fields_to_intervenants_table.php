<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCheckboxFieldsToIntervenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intervenants', function (Blueprint $table) {
            $table->boolean('installation_logiciel')->default(false);
            $table->boolean('creation_compte')->default(false);
            $table->boolean('serveur')->default(false);
            $table->boolean('depannage_materiles')->default(false);
            $table->boolean('instalation_ordinateur')->default(false);
            $table->boolean('probleme_acces_a_internet')->default(false);
            $table->boolean('probleme_acces_au_vpn')->default(false);
            $table->boolean('probleme_mot_de_passe')->default(false);
            $table->boolean('probleme_mot_de_passe_confirmation')->default(false);
            $table->boolean('imprimante')->default(false);
            $table->boolean('bi')->default(false);
            $table->boolean('creation_nouvelle_solution_informatique')->default(false);
            $table->boolean('mise_a_jours_solution_informatique_existante')->default(false);   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intervenants', function (Blueprint $table) {
            //
        });
    }
}
