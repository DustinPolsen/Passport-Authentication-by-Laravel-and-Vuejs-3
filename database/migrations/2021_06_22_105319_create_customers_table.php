<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_executive_id');
            $table->unsignedBigInteger('zone_id');
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->unique();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('account_balance')->default(0);
            $table->string('account_due')->default(0);
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('image')->nullable();
            $table->string('nid_image')->nullable();
            $table->tinyInteger('account_status')->default();
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
        Schema::dropIfExists('customers');
    }
}