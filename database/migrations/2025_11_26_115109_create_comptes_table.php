<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string('rib')->unique();
            $table->decimal('solde', 15, 2)->default(0);
            $table->foreignId('user_id')   // remplace client_id par user_id
                  ->constrained('users') // référence la table users
                  ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};