<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEoqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eoqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('demand');
            $table->integer('hc');
            $table->integer('oc');
            $table->integer('eoq');            
        });
        DB::statement('ALTER TABLE eoqs ADD year YEAR(4);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eoqs');
    }
}
