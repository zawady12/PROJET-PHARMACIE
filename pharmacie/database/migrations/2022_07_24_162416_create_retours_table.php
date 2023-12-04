<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retours', function (Blueprint $table) {
            $table->id();
            $table->integer('num_livraison');
            $table->integer('qté_liv');
            $table->integer('montant_initial');
            $table->integer('qté_retour');
            $table->integer('montant_retour');
            $table->integer('prix_fournisseur');
            $table->foreignId('fournisseur_id');
            $table->date('date_liv');
            $table->string('motif');
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
        Schema::dropIfExists('retours');
    }
}
