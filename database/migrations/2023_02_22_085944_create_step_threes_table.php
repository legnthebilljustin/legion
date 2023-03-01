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
        Schema::create('step_threes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_video_material_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('type');
            $table->longText('data')->default(NULL);
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
        Schema::dropIfExists('step_threes');
    }
};
