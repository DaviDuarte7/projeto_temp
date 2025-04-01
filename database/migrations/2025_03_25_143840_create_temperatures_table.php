<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperaturesTable extends Migration
{
    public function up()
    {
        Schema::create('temperatures', function (Blueprint $table) {
            $table->id();
            $table->float('value'); // O campo para armazenar a temperatura
            $table->timestamps();  // Campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('temperatures');
    }
}
