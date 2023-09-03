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
        Schema::create('weight_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // This is the foreign key column
            $table->string("weight_loaded_on")->default("barbell");
            $table->integer("weight")->default(0);
            $table->string("weight_units")->default("kg");
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
        Schema::dropIfExists('weight_pages');
    }
};
