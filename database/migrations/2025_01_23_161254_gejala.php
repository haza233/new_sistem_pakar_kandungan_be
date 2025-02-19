<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class gejala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {  
        Schema::create('gejala', function (Blueprint $table) {  
            $table->id();  
            $table->string('code')->unique();  
            $table->string('gejala');  
            $table->decimal('cf', 5, 2);  
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
        Schema::dropIfExists('gejala');
    }
}
