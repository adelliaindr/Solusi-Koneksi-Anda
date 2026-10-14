<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            $table->date('tanggal_upload')->nullable()->after('kategori');
        });

        // Isi artikel lama dengan tanggal dibuatnya
        DB::table('artikels')->whereNull('tanggal_upload')->update([
            'tanggal_upload' => DB::raw('DATE(created_at)'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artikels', function (Blueprint $table) {
            $table->dropColumn('tanggal_upload');
        });
    }
};
