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
            $table->string('documento',15);
            $table->string('nombres',30);
            $table->string('primer_apellido',15);
            $table->string('segundo_apellido',15);

            $table->string('email')->unique();
            

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');
            $table->date('fecha_nacimiento');
            $table->string('url',150);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
