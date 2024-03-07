<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  
{
    public function up()
    {
        Schema::create('muzakki_header', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
        
        Schema::create('muzakki', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreign('code')->references('code')->on('muzakki_header');
            $table->foreignId('user_id')->constrained('users');
            $table->string('type');
            $table->decimal('jumlah_bayar', 8, 2);
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->timestamps();
         });
    }  
  
    public function down() 
    {
        Schema::dropIfExists('muzakki');
        Schema::dropIfExists('muzakki_header');
    }
};
?>