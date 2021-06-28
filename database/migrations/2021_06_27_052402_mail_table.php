<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gmails', function(Blueprint $table){
            $table->id();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('gmail');
    }
}
