<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bokors', function (Blueprint $table) {
            $table->foreignId('pengrajin_id')
                ->nullable()
                ->after('category_id')
                ->constrained()
                ->restrictOnDelete();
            $table->string('cover')->nullable()->after('price');
        });
    }

    public function down(): void
    {
        Schema::table('bokors', function (Blueprint $table) {
            $table->dropConstrainedForeignId('pengrajin_id');
            $table->dropColumn('cover');
        });
    }
};
