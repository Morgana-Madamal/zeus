<?php
  use Illuminate\Database\Schema\Blueprint;
  use Zeus\Database\Migrations\Migration;

  class AddUsers2Fa extends Migration
  {
    public function up()
    {
      $this->schema->create('users2fa', function (Blueprint $table){
          $table->increments('id');
          $table->integer('user_id');
          $table->string('key_handle');
          $table->string('public_key');
          $table->text('certificate');
          $table->integer('counter');
          $table->string('totp_key');
          $table->timestamps();
      });
    }

    public function down()
    {
      $this->schema->drop('users2fa');
    }
  }
