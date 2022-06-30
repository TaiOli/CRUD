<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Form;

class Endereco extends Model{
    
    use HasFactory;
    protected $table='endereco';
    protected $primaryKey='id';
   
    public $timestamps=false;
    
     protected $fillable=[
       'outros_enderecos'
    ];

    public function Form(){
        return $this->belongsTo(Form::class,'id');
    }
}

