<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
             $table->id();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("category_id")->constrained("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->string("title");
            $table->string("fName");
            $table->string("lName");
            $table->string("image");
            $table->float("price");
            $table->integer("pages");
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
        Schema::dropIfExists('product');
    }
}
