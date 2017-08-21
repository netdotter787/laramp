<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InputFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    private $tableNames;
    
    public function up()
    {
        $tableNames = config('app.media_handling');

        Schema::create($tableNames['storage_systems_table_name'], function (Blueprint $table) {
            $table->increments('storage_system_id');
            $table->string('storage_system_name');
            $table->text('storage_system_description');
            $table->json('storage_system_data');
            $table->unsignedInteger('user_id');
            $table->boolean('is_Watchable');
            $table->unsignedTinyInteger('status');
            $table->softDeletes();
            $table->nullableTimestamps();
        });


        Schema::create($tableNames['storage_paths_table_name'], function (Blueprint $table) {
            $table->increments('storage_path_id');
            $table->text('storage_path');
            $table->unsignedInteger('storage_system_id');
            $table->json('storage_path_data');
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('status');
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('app.media_handling');
        $this->tableNames = $tableNames;

        Schema::drop($tableNames['storage_systems_table_name']);
        Schema::drop($tableNames['storage_paths_table_name']);
    }
}
