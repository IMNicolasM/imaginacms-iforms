<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssignedToIntoLeadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iforms__leads', function (Blueprint $table) {
          $table->integer('assigned_to')->unsigned()->nullable();
          $table->foreign('assigned_to')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iforms__leads', function (Blueprint $table) {
          $table->dropForeign(['assigned_to']);
          $table->dropColumn('assigned_to');
        });
    }
}
