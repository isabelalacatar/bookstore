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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('totalprice');
            $table->date('orderdate');
            $table->timestamps();

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('book_id');
            
        $table->foreign("user_id")->references("id")->on("users")
        ->onUpdate("cascade")->onDelete('cascade');


    $table->foreign("book_id")->references("id")->on("books")
        ->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
