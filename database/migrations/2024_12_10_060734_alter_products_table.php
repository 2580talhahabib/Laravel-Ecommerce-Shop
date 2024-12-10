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
        Schema::table('products', function (Blueprint $table) {
$table->text('short_desc')->nullable()->after('description');
$table->text('short_desc')->nullable()->after('description');
$table->text('shiping_returns')->nullable()->after('short_desc');
$table->text('shiping_returns')->nullable()->after('short_desc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
