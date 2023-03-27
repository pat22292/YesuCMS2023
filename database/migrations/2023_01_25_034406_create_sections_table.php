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
        DB::table('sections')->insert(
            ['component_name' => 'slider',  'title' => 'slider', 'page_id' => 1, 'content' => '[
                {
                    "class": null,
                    "title": "1",
                    "title-style-class": null,
                    "description": null,
                    "descStyleClass": null,
                    "imgUrl": "https:\/\/images.pexels.com\/photos\/325185\/pexels-photo-325185.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                    "imgClass": null
                },
                {
                    "class": null,
                    "title": "2",
                    "title-style-class": null,
                    "description": null,
                    "descStyleClass": null,
                    "imgUrl": "https:\/\/images.pexels.com\/photos\/919606\/pexels-photo-919606.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                    "imgClass": null
                },
                {
                    "class": null,
                    "title": "3",
                    "title-style-class": null,
                    "description": null,
                    "descStyleClass": null,
                    "imgUrl": "https:\/\/images.pexels.com\/photos\/2835436\/pexels-photo-2835436.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                    "imgClass": null
                },
                {
                    "class": null,
                    "title": "4",
                    "title-style-class": null,
                    "description": null,
                    "descStyleClass": null,
                    "imgUrl": "https:\/\/images.pexels.com\/photos\/571169\/pexels-photo-571169.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                    "imgClass": null
                }
            ]']
        );
        DB::table('sections')->insert(
            ['component_name' => 'twoColumn',  'title' => 'twoColumntest', 'page_id' => 1]
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
