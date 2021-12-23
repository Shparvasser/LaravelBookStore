<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ratings')) {
            Schema::create('ratings', function (Blueprint $table) {
                $table->bigInteger('book_id')->unsigned();
                $table->bigInteger('author_id')->unsigned();
                $table->decimal('rating', 2, 1);
                $table->timestamps();
                $table->unique(['book_id', 'author_id']);
            });
            Schema::table('ratings', function (Blueprint $table) {
                $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropForeign('ratings_author_id_foreign');
            $table->dropForeign('ratings_book_id_foreign');
        });
    }
}
