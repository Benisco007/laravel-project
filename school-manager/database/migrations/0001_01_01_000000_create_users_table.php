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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Remplace 'name' par 'nom'
            $table->string('prenom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Tes champs personnalisés
            $table->string('role')->default('eleve');
            $table->string('langue_souhaitee')->nullable();
            $table->string('duree_formation')->nullable();
            $table->string('niveau')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        // ... la suite (password_reset_tokens et sessions) ne change pas
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
