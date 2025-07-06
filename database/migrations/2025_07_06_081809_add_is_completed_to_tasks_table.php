<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Pastikan tabel tasks ada terlebih dahulu
        if (Schema::hasTable('tasks')) {
            Schema::table('tasks', function (Blueprint $table) {
                // Cek dulu apakah kolom sudah ada
                if (!Schema::hasColumn('tasks', 'is_completed')) {
                    $table->boolean('is_completed')->default(false);
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('tasks')) {
            Schema::table('tasks', function (Blueprint $table) {
                if (Schema::hasColumn('tasks', 'is_completed')) {
                    $table->dropColumn('is_completed');
                }
            });
        }
    }
};
