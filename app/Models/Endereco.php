<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model{
    
     use HasFactory;
      protected $table='form';
      
      public function form(){
          return $this->belongsTo(Form::class);
      }
}

