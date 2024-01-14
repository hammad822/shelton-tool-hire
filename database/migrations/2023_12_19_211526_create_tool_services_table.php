<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tool::class,'tool_id');
            $table->longText('type');
            $table->decimal('total_rating')->default(0);
            $table->string('status')->default('Pending');
            $table->timestamps();

            $table->foreign('tool_id')->references('id')->on('tools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tool_services');
    }
}
