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
        Schema::table('users', function ($table) {
            $table->string('firstname')->nullable();
            $table->string('lastname');
            $table->dropColumn('name');

            $table->string('birthdate')->nullable();
            $table->string('streetandnumber')->nullable();
            $table->string('zipcode', 4)->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users', function ($table) {
        //     $table->dropColumn('firstname');
        //     $table->dropColumn('lastname');
        // });
    }
};
