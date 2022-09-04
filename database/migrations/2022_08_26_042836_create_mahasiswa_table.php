<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->unique();
            $table->string('nim')->unique();
            $table->string('nama'); 
            $table->string('image')->nullable();        
            $table->enum('jns_kelamin', ['Laki-Laki', 'Perempuan']);   
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');     
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
        Schema::dropIfExists('mahasiswa');
    }
}
