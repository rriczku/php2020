<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments',function(Blueprint $table)
        {
            $table->unsignedBigInteger('book_id')->default(1);
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

}
