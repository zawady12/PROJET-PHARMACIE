<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneCommandeProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *utilisée
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_commande_produits', function (Blueprint $table) {
            $table->id();
            $table->integer('num_commande');
            $table->foreignId('produit_id');
            $table->integer('qnté_commandée');
            $table->Date('date_commande');
            $table->string('description');
            $table->foreignId('user_id');
            $table->foreignId('fournisseur_id');
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
        Schema::dropIfExists('ligne_commande_produits');
    }
}
