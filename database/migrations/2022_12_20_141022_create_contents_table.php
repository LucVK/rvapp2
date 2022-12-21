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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('page_id')->nullable()->constrained('pages', 'id')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('name',32);
            $table->text('data')->default('');
            $table->string('visibility')->default('public');
            $table->date('fromdate')->nullable(true);
            $table->date('todate')->nullable(true);

            $table->integer('position')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
};
