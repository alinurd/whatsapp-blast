<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  
{
    public function up()
    {
        Schema::create('muzakki_header', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('user_id')->constrained('users');
         });
        
        
        
    }  
  
    public function down() 
    {
         Schema::dropIfExists('muzakki_header');
    }
};
?>