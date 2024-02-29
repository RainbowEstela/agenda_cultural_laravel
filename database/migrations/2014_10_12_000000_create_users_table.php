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
            $table->string('rol');
            $table->string('dni');
            $table->string('apellidos');
            $table->integer('edad')->nullable();
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('puesto')->nullable();
            $table->unsignedBigInteger("empresa_id")->nullable();
            $table->foreign("empresa_id")->references('id')->on('empresas')->onDelete('set null');

            // datos por defecto de breeze
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
