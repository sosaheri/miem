<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdCedulonToFinanciamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financiamientos', function (Blueprint $table) {
            $table->string('id-cedulon')->nullable()->after('monto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financiamientos', function (Blueprint $table) {
            $table->dropColumn('id-cedulon');
        });
    }
}
