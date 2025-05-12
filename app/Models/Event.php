<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use PhpParser\Node\Stmt\Return_;

class Event extends Model
{
    use HasFactory;
    
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];
    
    public function user() {
        //  Aq fazemor um funçao chamada 'user' pois é UM usuario q é dono, por isso é user pois estamos trando apenas de um determinado usuario
        // LEMBRNDO Q O NOME DO METODO REFLETE PARA SUA FUNCIONALIDADE, "SEU NOME FAZ OQ TEM Q SER FEITO AO METODO Q VAI ATENDER

        // Nele estanciaremos o proprio obj por isso usaremos o '$this' e atrelaremos o metodo "belongsTo   ()' para q falarmos a quem ele pertenca
        //   e dentro do "bilongsTo(''App\Models\User')" passamos o 'App\Models\User' nosso model de usuario, pois queremos q o evento perteça a um usuario q esta dentro d pasta Model q fica dentro do App
        return $this->belongsTo('App\Models\User');
    } 


    public function users()
    {
            //Estamos passando com o "bilongsToMany()" q nosso evento vai te varios usuarios 
        return $this->belongsToMany('App\Models\User');
    }
}
