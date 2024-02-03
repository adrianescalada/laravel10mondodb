<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mongodb';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection($this->connection)->create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('characterId');
            $table->string('name');
            $table->json('alternate_names');
            $table->string('species');
            $table->string('gender');
            $table->string('house');
            $table->date('dateOfBirth');
            $table->integer('yearOfBirth');
            $table->boolean('wizard');
            $table->string('ancestry');
            $table->string('eyeColour');
            $table->string('hairColour');
            $table->json('wand');
            $table->string('patronus');
            $table->boolean('hogwartsStudent');
            $table->boolean('hogwartsStaff');
            $table->string('actor');
            $table->json('alternate_actors');
            $table->boolean('alive');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
