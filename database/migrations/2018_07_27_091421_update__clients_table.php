<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',100)->unique();
            $table->string('phone');
            $table->string('password');
            $table->unsignedInteger('advisor_id');
            $table->integer('account_status')->default(0);
            $table->string('project',50)->nullable();
            $table->string('investment',50)->nullable();
            $table->integer('activation_code');
            $table->integer('deal_status')->default(0);
            $table->date('deleted_at')->default(null);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('advisor_id')->references('id')->on('financial_advisors')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
