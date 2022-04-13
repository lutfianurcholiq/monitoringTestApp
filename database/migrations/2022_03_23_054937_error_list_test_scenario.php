<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ErrorListTestScenario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_list_test_scenario', function (Blueprint $table) {
            $table->foreignId('error_list_id');
            $table->foreignId('test_scenario_id');
            $table->primary(['error_list_id', 'test_scenario_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('error_list_test_scenario');
    }
}
