<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class,'owner_id');
            $table->enum('type',['Building','Cleaning','Decorating','Landscaping','Electrical','Plumbing'])->default('Building');
            $table->boolean('is_enable')->default(true);
            $table->string('name');
            $table->string('status')->default('Pending');
            $table->string('address');
            $table->string('post_code');
            $table->integer('comment_count')->default(0);
            $table->integer('like_count')->default(0);
            $table->integer('review_count')->default(0);
            $table->string('avatar');
            $table->longText('description')->nullable();
            $table->decimal('total_rating')->default(0);
            $table->decimal('price_per_hour')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tools');
    }
}
