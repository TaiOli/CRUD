<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Endereco;

class Form extends Model
{
   use HasFactory;
   protected $fillable=[
       'nome',
       'cpf',
       'email',
       'perfil',
       'endereco'
    ];
   
   public $timestamps=false;
   protected $table='form';
   protected $primaryKey='id';
 
   //One to Many -> Relacionamento um para muitos
   public function enderecos(){
         return $this->hasMany(Endereco::class,'endereco_id');
   }
    
   //One to One -> Relacionamento um para um
   public function perfil(){
       return $this->hasOne(Perfil::class,'id');
   }
   
    public function perfilMany(){
        return $this->belongsTo(Perfil::class,'perfil_id');
    }
}
   
