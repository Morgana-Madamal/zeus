<?php
  use Illuminate\Database\Schema\Blueprint;
  use $useClassName;

  class $className extends $baseClassName
  {
    public function up()
    {
      $this->schema->create('', function (Blueprint $table){
        //
      });

      $this->schema->table('', function (Blueprint $table){
        //
      });
    }

    public function down()
    {
      $this->schema->table('', function (Blueprint $table){
        //
      });

     $this->schema->drop('');
    }
  }