<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            if (!Schema::hasColumn('rooms', 'title')) {
                $table->string('title')->nullable()->after('name');
            }
            if (!Schema::hasColumn('rooms', 'quality_label')) {
                $table->string('quality_label')->nullable()->after('description');
            }
            if (!Schema::hasColumn('rooms', 'stars')) {
                $table->unsignedTinyInteger('stars')->default(4)->after('quality_label');
            }
        });

        DB::table('rooms')
            ->whereNotNull('name')
            ->whereNull('title')
            ->update(['title' => DB::raw('name')]);
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            if (Schema::hasColumn('rooms', 'stars')) {
                $table->dropColumn('stars');
            }
            if (Schema::hasColumn('rooms', 'quality_label')) {
                $table->dropColumn('quality_label');
            }
            if (Schema::hasColumn('rooms', 'title')) {
                $table->dropColumn('title');
            }
        });
    }
};
