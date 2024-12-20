<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('kabupaten_id'); // or another default value
            $table->unsignedBigInteger('kecamatan_id'); // or another default valueinteger('kecamatan_id');
            $table->unsignedBigInteger('desa_id'); // or another default valueinteger('desa_id');
            $table->string('report_type');
            $table->text('report_detail');
            $table->string('image_path')->nullable();    
            $table->integer('user_id');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
