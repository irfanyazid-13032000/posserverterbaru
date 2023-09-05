<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaDataToStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {

              $table->string('meta_keyword')->nullable()->after('facebook_pixel');
              $table->string('meta_image')->nullable()->after('meta_keyword');
              $table->string('meta_description')->nullable()->after('footer_note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
           $table->dropColumn('meta_keyword');
           $table->dropColumn('meta_image');
            $table->dropColumn('meta_description');
        });
    }
}
