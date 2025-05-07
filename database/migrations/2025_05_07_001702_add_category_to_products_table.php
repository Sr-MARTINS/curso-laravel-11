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
         //estamos crinado uma nova coluna chamada 'categoty' na nossa "$table" 
        Schema::table('products', function (Blueprint $table) {
                //estamos passando o nome como a coluna vai ser chamada; interessante q ele seja do msm nome da sua propriendeda
            $table->string('category', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Em seguida passaremos o 'category' para ca 'metod down' para q ele possa ser removido quando for feito algum rollback
        Schema::table('products', function (Blueprint $table) {
            //usamos o metodo 'dropColumn" para podermos dar o rollback
                    //passaremos so o nome da coluna q queremos remover 
            $table->dropColumn('category');
        });
    }
};

    
 

