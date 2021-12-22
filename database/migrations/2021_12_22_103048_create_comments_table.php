<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('author_id')->unsigned();
                $table->bigInteger('book_id')->unsigned();
                $table->text('comment');
                $table->decimal('rating', 2, 1);
                $table->timestamps();
            });
            Schema::table('comments', function (Blueprint $table) {
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
        Schema::dropIfExists('comments');
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_author_id_foreign');
            $table->dropForeign('comments_book_id_foreign');
        });
    }
}
