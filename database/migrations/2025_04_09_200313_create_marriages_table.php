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
        Schema::create('marriages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('husband_id')->constrained('members')->onDelete('cascade');
            $table->foreignId('wife_id')->constrained('members')->onDelete('cascade');
            $table->date('marriage_date')->nullable();
            $table->text('wed_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriages');
    }
};
