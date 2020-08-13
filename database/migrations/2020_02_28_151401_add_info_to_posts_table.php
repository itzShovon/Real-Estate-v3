<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->string('gallery');
            $table->string('option')->nullable();
            $table->string('category')->nullable();
            $table->string('price_flag')->nullable();
            $table->integer('price')->nullable();
            $table->string('area')->nullable();
            $table->string('road')->nullable();
            $table->boolean('location_flag')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('partial')->nullable();
            $table->string('ward')->nullable();
            $table->string('url')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('corridor')->nullable();
            $table->string('kitchen')->nullable();
            $table->string('floor')->nullable();
            $table->string('parking')->nullable();
            $table->string('drawing')->nullable();
            $table->string('dining')->nullable();
            $table->integer('advance')->nullable();
            $table->string('availability')->nullable();
            $table->string('validity')->nullable();
            $table->string('address')->nullable();
            $table->string('seat_type')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->boolean('map_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Schema::dropIfExists('gallery');
            Schema::dropIfExists('option');
            Schema::dropIfExists('category');
            Schema::dropIfExists('price_flag');
            Schema::dropIfExists('price');
            Schema::dropIfExists('area');
            Schema::dropIfExists('road');
            Schema::dropIfExists('location_flag');
            Schema::dropIfExists('division');
            Schema::dropIfExists('district');
            Schema::dropIfExists('city');
            Schema::dropIfExists('partial');
            Schema::dropIfExists('ward');
            Schema::dropIfExists('url');
            Schema::dropIfExists('bedroom');
            Schema::dropIfExists('bathroom');
            Schema::dropIfExists('corridor');
            Schema::dropIfExists('kitchen');
            Schema::dropIfExists('floor');
            Schema::dropIfExists('parking');
            Schema::dropIfExists('drawing');
            Schema::dropIfExists('dining');
            Schema::dropIfExists('advance');
            Schema::dropIfExists('availability');
            Schema::dropIfExists('validity');
            Schema::dropIfExists('address');
            Schema::dropIfExists('seat_type');
            Schema::dropIfExists('latitude');
            Schema::dropIfExists('longitude');
            Schema::dropIfExists('map_status');
        });
    }
}
