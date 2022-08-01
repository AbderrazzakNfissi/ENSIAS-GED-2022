<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partages', function (Blueprint $table) {
            $table->id();
            $table->string('message'); //message
            $table->string('email'); //destinataire
            $table->string('document');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //celui qui a envoyé
            $table->unsignedInteger("etat");
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
        Schema::dropIfExists('partages');
    }
}
