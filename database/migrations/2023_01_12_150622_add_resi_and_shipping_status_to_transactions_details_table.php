<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions_details', function (Blueprint $table) {
            $table->string('transaction_status'); ///PENDING/SHIPPING/SUCCESS/FAILED
            $table->string('resi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions_details', function (Blueprint $table) {
            $table->dropColumn('transaction_status'); ///PENDING/SHIPPING/SUCCESS/FAILED
            $table->dropColumn('resi');
        });
    }
};
