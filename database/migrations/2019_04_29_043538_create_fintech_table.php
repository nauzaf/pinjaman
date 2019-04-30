<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFintechTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fintech', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kunjungan',100);
            $table->string('name',100)->nullable($value = true);
            $table->text('syarat')->nullable($value = true);
            $table->text('angsuran')->nullable($value = true);
            $table->string('tenor', 100)->nullable($value = true);
            $table->text('bunga')->nullable($value = true);
            $table->text('agunan')->nullable($value = true);
            $table->float('biaya_awal', 120, 8)->nullable($value = true);
            $table->float('bungaPerHari', 8, 8)->nullable($value = true);
            $table->float('bungaPerBulan', 8, 8)->nullable($value = true);
            $table->integer('min_pinjaman')->nullable($value = true);
            $table->bigInteger('max_pinjaman')->nullable($value = true);
            $table->string('case')->nullable($value = true);
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
        Schema::dropIfExists('fintech');
    }
}
