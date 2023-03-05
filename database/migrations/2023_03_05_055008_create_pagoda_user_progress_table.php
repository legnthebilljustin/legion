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
        Schema::create('pagoda_user_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('view_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('user_id');
            $table->longText('progress');
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
        Schema::dropIfExists('pagoda_user_progress');
    }
};
