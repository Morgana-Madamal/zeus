<?php
  use Zeus\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique;
            $table->string('email')->nullable()->unique;
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company')->nullable();
            $table->string('vat_id')->nullable();
            $table->string('password');
            $table->float('credit')->default(0);
            $table->integer('vat')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->schema->drop('users');
    }
}
