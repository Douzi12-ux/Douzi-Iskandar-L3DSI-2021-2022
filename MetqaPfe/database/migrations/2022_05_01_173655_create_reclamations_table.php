<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iddepartement');
            $table->foreign('iddepartement')->references('id')->on('departements');
            $table->string('nom');
            $table->string('email');
            $table->string('matrielAReparer');
            $table->string('problems');
            $table->string('details');
            $table->string('Autres');
            $table->string('autresdetails');
            $table->string('plusdetails');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('reclamations');
    }
}
