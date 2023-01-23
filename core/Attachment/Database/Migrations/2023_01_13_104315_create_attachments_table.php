<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
			$table->string('original');
			$table->string('extension');
			$table->string('photo_400')->nullable();
			$table->string('photo_600')->nullable();
			$table->string('photo_800')->nullable();
			$table->enum('type', array('image','video','doc'))->default('image');
			$table->string('usage')->nullable();
			$table->string('display_name')->nullable();
			$table->string('attachmentable_type');
			$table->integer('attachmentable_id');
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
        Schema::dropIfExists('attachments');
    }
}
