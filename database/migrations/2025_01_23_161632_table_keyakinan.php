<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableKeyakinan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {  
        Schema::create('tablekeyakinan', function (Blueprint $table) {  
            $table->id();  
            $table->string('keterangan');  
            $table->decimal('nilai', 5, 2);  
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
        Schema::dropIfExists('tablekeyakinan');
    }
}