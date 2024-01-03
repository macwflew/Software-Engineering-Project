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
        Schema::create('textbooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('cover')->nullable();
            $table->float('price')->default(2.00);
            $table->foreignId('textbook_state_id')->constrained();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('textbooks');
    }
};
