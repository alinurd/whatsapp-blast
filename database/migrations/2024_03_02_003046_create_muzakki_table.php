<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  
{
    public function up()
    {
 
        
        Schema::create('muzakki', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            // $table->foreign('code')->references('code')->on('muzakki_header');
            $table->foreignId('user_id')->constrained('users');
            $table->string('type');
            $table->string('satuan');
            $table->string('jumlah_bayar');
             $table->foreignId('kategori_id')->constrained('kategori');
            $table->timestamps();
         });
    }  
  
    public function down() 
    {
        Schema::dropIfExists('muzakki');
     }
};
?>