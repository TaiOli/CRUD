<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
   use HasFactory;
   protected $fillable=[
       'nome',
       'cpf',
       'email',
       'perfil',
       'endereco',
    ];
   
   public $timestamps=false;
   protected $table='form';
   
   public function endereco_Outros(){
       return $this->hasMany(Endereco::class);
       
   }
}
   
