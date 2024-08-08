<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class intervenants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenants', function (Blueprint $table) {
            $table->id();
            $table->string('type_demande');
            $table->dateTime('date_creation');
            $table->dateTime('date_modification');
            $table->string('N_ticket');
            $table->string('priorite');
            $table->string('matricule_employe');
            $table->string('matricule_intervenant');
            $table->text('description_resolution');
            $table->string('etat');
            $table->timestamps();
        });
        
    }

   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intervenants');
    }
}


