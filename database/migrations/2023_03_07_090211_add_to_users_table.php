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
        Schema::table('users', function (Blueprint $table) {
            
            $table->after('id',function($table){
                $table->unsignedBigInteger('document_id');
                $table->foreign('document_id')
                        ->references('id')
                        ->on('documents')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            });

            $table->after('email_verified_at',function($table){
                $table->unsignedBigInteger('estado_id');
                $table->foreign('estado_id')
                        ->references('id')
                        ->on('estados')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            });


            $table->after('password',function($table){

                $table->unsignedBigInteger('gender_id');
                $table->foreign('gender_id')
                        ->references('id')
                        ->on('genders')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');

            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
