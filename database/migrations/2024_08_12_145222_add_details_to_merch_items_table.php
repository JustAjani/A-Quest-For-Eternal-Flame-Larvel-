<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToMerchItemsTable extends Migration
{
    public function up()
    {
        Schema::table('merch_items', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('additional_image1')->nullable();
            $table->string('additional_image2')->nullable();
        });
    }

    public function down()
    {
        Schema::table('merch_items', function (Blueprint $table) {
            $table->dropColumn(['description', 'additional_image1', 'additional_image2']);
        });
    }
}

