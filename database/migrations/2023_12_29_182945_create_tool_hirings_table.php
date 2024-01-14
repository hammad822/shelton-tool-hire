<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolHiringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_hirings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tool::class,'tool_id');
            $table->foreignIdFor(\App\Models\User::class,'user_id');
            $table->string('type')->default('Hourly');
            $table->string('duration')->default('0');
            $table->string('total_price')->default('0');
            $table->string('hiring_price')->default('0');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();

            $table->foreign('tool_id')->references('id')->on('tools');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tool_hirings');
    }
}
