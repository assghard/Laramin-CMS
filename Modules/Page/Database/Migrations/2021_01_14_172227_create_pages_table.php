<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page__pages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->boolean('is_homepage')->default(0);
            $table->boolean('is_active')->default(0);
            $table->string('title');
            $table->string('slug')->unique();

            $table->string('caption')->nullable();
            $table->longText('body')->nullable();

            // $table->string('meta_title')->nullable();
            // $table->string('meta_description')->nullable();
            // $table->string('og_title')->nullable();
            // $table->string('og_description')->nullable();
            // $table->string('og_image')->nullable();
            // $table->string('og_type')->nullable();

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
        Schema::dropIfExists('page__pages');
    }
}
