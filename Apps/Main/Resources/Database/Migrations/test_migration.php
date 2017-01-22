<?php


class MyFirstMigration extends \Illuminate\Database\Migrations\Migrator
{
    public function up()
    {
        $this->schema->create('widgets', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->increments('id');
            $table->integer('serial_number');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->schema->drop('widgets');
    }

}