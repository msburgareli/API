<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up($tournamentName)
    {
        Schema::create($tournamentName, function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
            $table->id('winner');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down($tournamentName)
    {
        Schema::dropIfExists($tournamentName);
    }
};
