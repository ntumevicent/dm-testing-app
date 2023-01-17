<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('sctrxn_id')->nullable();
            $table->string('user_phone_number')->nullable();
            $table->string('bill_details')->nullable();
            $table->string('emtx_id')->nullable();
            $table->double('txn_fee', 10)->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('txn_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_transactions');
    }
}
