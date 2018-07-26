<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialAdvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_advisors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',100)->unique();
            $table->string('phone');
            $table->string('password');
            $table->integer('account_status')->default(0);
            $table->integer('activation_code');
            $table->integer('fa_rank')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();


            //relation to users table ...

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_advisors');
    }
}
