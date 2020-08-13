<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Contact number
            $table->string('contact')->nullable();
            // User category - Owner/ Representator
            $table->string('category')->nullable();
            // User address
            $table->mediumText('address')->nullable();
            // User Status
            $table->string('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('contact');
            $table->dropColumn('category');
            $table->dropColumn('address');
            $table->dropColumn('status');
        });
    }
}
