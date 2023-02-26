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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('component_name');
            $table->string('component_styles')->nullable();
            $table->string('title');
            $table->string('title_style_class')->nullable();
            $table->string('description')->nullable();;
            $table->longText('desc_style_class')->nullable();
            $table->string('image')->nullable();
            $table->string('image_style_class')->nullable();
            $table->longText('content')->nullable();
            $table->integer('page_id');
            $table->timestamps();
        });

        DB::table('sections')->insert(
            ['component_name' => 'CenteredLogoNavBar',  'title' => 'CenteredLogoNavBar', 'page_id' => 1]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
};
