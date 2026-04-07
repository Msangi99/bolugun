<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('site_pages')->where('slug', 'projects')->update(['slug' => 'products']);
    }

    public function down(): void
    {
        DB::table('site_pages')->where('slug', 'products')->update(['slug' => 'projects']);
    }
};
