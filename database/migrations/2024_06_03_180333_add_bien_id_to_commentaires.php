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
        Schema::table('commentaires', function (Blueprint $table) {
            $table->unsignedBigInteger('bien_id');
            $table->foreign('bien_id')->references('id')->on('biens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropForeign(['bien_id']); // Supprime la clé étrangère
            $table->dropColumn('bien_id'); // Supprime la colonne client_id
        });
    }
};
