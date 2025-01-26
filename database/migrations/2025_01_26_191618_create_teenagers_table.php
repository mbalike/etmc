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
        Schema::create('teenagers', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('last_name');
            $table->enum('gender',['male','female']);
            $table->date('birthdate');
            $table->foreignId('father_id')->nullable()->constrained('members');
            $table->foreignId('mother_id')->nullable()->constrained('members');
            $table->foreignId('supervisor_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teenagers');
    }
};
