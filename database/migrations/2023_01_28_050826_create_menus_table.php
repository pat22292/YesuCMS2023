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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('container_classes');
            $table->string('title');
            $table->string('title_style_class')->nullable();
            $table->string('description')->nullable();;
            $table->longText('desc_style_class')->nullable();
            $table->string('image')->nullable();
            $table->string('image_style_class')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });

        DB::table('menus')->insert(
            ['container_classes' => 'container',  'title' => 'test', 'content' => '[ { "name": "Home",
                "link": ""
                },
                { "name": "About",
                "link": "product"
                },
                { "name": "Products",
                "link": "product"
                },
                { "name": "Pricing",
                "link": "product"
                },
                { "name": "Contact",
                "link": "product"
                },
                { "name": "Galleries",
                "link": "product"
                }
            
            ]']
        );
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
