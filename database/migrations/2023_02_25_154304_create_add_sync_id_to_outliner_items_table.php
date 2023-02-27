<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('outliner_items', function (Blueprint $table) {
            $table->string('sync_id')->unique()->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('outliner_items', function (Blueprint $table) {
            $table->dropColumn('sync_id');
        });
    }
};
