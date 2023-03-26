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
        Schema::table('meetings', function (Blueprint $table) {
            //
            $table->string('name')->after('user_id');
            $table->string('office')->after('name');
            $table->string('client_name')->after('start_time');
            $table->integer('age')->after('client_name');
            $table->string('disease')->after('age');
            $table->text('consultation')->after('disease');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meetings', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('office');
            $table->dropColumn('client_name');
            $table->dropColumn('age');
            $table->dropColumn('disease');
            $table->dropColumn('consultation');
        });
    }
};
