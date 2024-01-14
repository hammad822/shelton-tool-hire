<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tool::class,'tool_id')->nullable();
            $table->foreignIdFor(\App\Models\User::class,'user_id');
            $table->string('comment');
            $table->integer('comment_replies')->default(0);
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('tool_comments');
    }
}
