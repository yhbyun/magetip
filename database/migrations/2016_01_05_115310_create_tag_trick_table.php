<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTrickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_trick', function($table)
        {
            $table->increments('id');
            $table->integer('tag_id')->unsigned()->index();
            $table->integer('trick_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('trick_id')
                ->references('id')->on('tricks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('tag_trick', function($table)
        {
            $table->dropforeign('tag_trick_tag_id_foreign');
            $table->dropforeign('tag_trick_trick_id_foreign');
        });

        schema::drop('tag_trick');
    }
}
