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
    Schema::table('architects', function (Blueprint $table) {
        $table->string('decline_reason')->nullable()->after('access');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
{
    Schema::table('architects', function (Blueprint $table) {
        $table->dropColumn('decline_reason');
    });
}

};
