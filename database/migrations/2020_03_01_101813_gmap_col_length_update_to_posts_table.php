<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class GmapColLengthUpdateToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->double('latitude', 8, 6)->nullable()->change();
            // $table->double('longitude', 8, 6)->nullable()->change();
            DB::statement('ALTER TABLE posts MODIFY COLUMN latitude DOUBLE(8, 6)');
            DB::statement('ALTER TABLE posts MODIFY COLUMN longitude DOUBLE(8, 6)');
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
            $table->text('latitude')->change();
            $table->text('longitude')->change();
        });
    }
}
