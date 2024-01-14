<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tool_id')->nullable();
            $table->foreignIdFor(\App\Models\User::class,'user_id');
            $table->unsignedBigInteger('service_sub_service_id')->nullable();
            $table->decimal('rating');
            $table->timestamps();

            $table->foreign('tool_id')->references('id')->on('tools');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('service_sub_service_id')->references('id')->on('service_sub_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tool_reviews');
    }
}
