<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_date');
            $table->string('renewal_date')->nullable();
            $table->string('returned_date')->nullable();
            $table->string('added_by')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('request_id')->constrained('requests');
            $table->foreignId('laptop_id')->constrained('laptops');
            $table->index(['loan_date', 'renewal_date', 'returned_date']);
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
        Schema::dropIfExists('loans');
    }
}
