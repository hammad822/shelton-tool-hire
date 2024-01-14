<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSubServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_sub_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\ToolServices::class,'service_id');
            $table->longText('type');
            $table->decimal('total_rating')->default(0);
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('tool_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_sub_services');
    }
}
