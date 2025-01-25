<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelRiwayatDiagnosa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {  
        Schema::create('tableriwayat', function (Blueprint $table) {  
            $table->id();  
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');  
            $table->foreignId('id_penyakit')->constrained('jenis_penyakit')->onDelete('cascade');  
            $table->decimal('presentase', 5, 2);  
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
        Schema::dropIfExists('tableriwayat');
    }
}
