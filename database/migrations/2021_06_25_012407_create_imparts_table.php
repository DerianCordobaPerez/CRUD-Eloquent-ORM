<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpartsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('imparts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('code_class', 5);
            $table->string('teacher_id', 10);
            $table->bigInteger('classroom_id', false, true);
            $table->foreign('code_class')->references('code')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('classroom_id')->references('id')->on('class_rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('imparts');
    }
}
