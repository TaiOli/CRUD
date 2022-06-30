<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    
    public function Form(){
        return $this->belongsTo(Form::class,'user_id');
    }
    
    //One to Many - Relacionamento de um para muitos
    public function FormsMany(){
         return $this->hasMany(Form::class,'id');
   }
}
