<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilAngketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_angkets', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->string('kelas');
            for($i=1; $i<=180; $i++) $table->string('jawaban'.$i, 10)->nullable();
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
        Schema::dropIfExists('hasil_angkets');
    }
}
