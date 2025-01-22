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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('birthdate');
            $table->enum('gender',['male','female']);
            $table->enum('marital_status',['single','married','widowed']);
            $table->foreignId('family_id')->constrained('families');
            $table->foreignId('supervisor_id')->constrained('users');
            $table->foreignId('spouse_id')->nullable()->constrained('members');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
