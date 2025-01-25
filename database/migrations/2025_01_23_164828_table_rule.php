<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {  
        Schema::create('tablerule', function (Blueprint $table) {  
            $table->id();  
            $table->foreignId('id_gejala')->constrained('gejala')->onDelete('cascade');  
            $table->foreignId('id_penyakit')->constrained('jenis_penyakit')->onDelete('cascade');    
            $table->decimal('nilai_mb', 3, 2);  
            $table->decimal('nilai_md', 3, 2);  
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
        Schema::dropIfExists('tablerule');
    }
}
