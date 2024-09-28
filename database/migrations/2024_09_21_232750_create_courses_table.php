<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug',128)->unique();
            $table->text('short_text')->nullable();
            $table->string('image');
            $table->float('basic_price');
            $table->float('price');
            $table->longText('description')->nullable();
            $table->text('requirements')->nullable();
            $table->text('objectives')->nullable();
            $table->enum('status', ['open','soon','hidden','closed'])->default('open');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')
                ->on('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
