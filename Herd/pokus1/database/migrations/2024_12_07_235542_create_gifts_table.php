<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Vytvoření tabulky gifts
        Schema::create('gifts', function (Blueprint $table) {
            $table->id(); // Primární klíč
            $table->string('name'); // Název dárku
            $table->decimal('price', 8, 2)->nullable(); // Cena dárku, volitelná hodnota
            $table->string('url')->nullable(); // URL dárku (např. odkaz na produkt)
            $table->string('where_bought')->nullable(); // Kde byl dárek koupen
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Cizí klíč na uživatele, pokud je dárek přiřazený k uživateli
            $table->timestamps(); // Sloupce created_at a updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifts');
    }
}
