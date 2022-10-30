<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annuncements', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->longText('description');
            // $table->string('category');
            // impostiamo il prezzo in numero decimale con massimo 8 cifre ed 2 dopo la virgola
            $table->decimal('price', 8, 2);
            $table->string('provincia');
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
        Schema::dropIfExists('annuncements');
    }
};
