<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JenisPenyakit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {  
        Schema::create('jenis_penyakit', function (Blueprint $table) {  
            $table->id();  
            $table->string('code')->unique();  
            $table->string('nama_penyakit'); 
            $table->string('deskripsi');  
            $table->string('solusi'); 
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
        Schema::dropIfExists('jenis_penyakit');
    }
}