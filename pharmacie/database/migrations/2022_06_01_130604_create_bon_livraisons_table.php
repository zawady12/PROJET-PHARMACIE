<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_livraisons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id');
            $table->integer('num_livraison');
            $table->integer('qté_liv');
            $table->integer('prix_fournisseur');
            $table->integer('montant_initial');
            $table->foreignId('fournisseur_id');
            $table->date('date_liv');
            $table->time('heure_liv');
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
        Schema::dropIfExists('bon_livraisons');
    }
}
