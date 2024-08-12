<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchItemsTable extends Migration
{
    public function up()
    {
        Schema::create('merch_items', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->string('image');
            $table->string('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('merch_items');
    }
}


