<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Http\Requests\StoreUpdateCadFormRequest;


class FormularioController extends Controller
{
    
   //Adicionando os dados do formulário a uma lista
    public function store(Request $request){
        
        //validando campos
        $validacao=$request->validate([
            'nome'=>'required',
            'cpf'=>'required',
            'email'=>'required',
            'perfil'=>'required',
            'endereco'=>'required',  
        ]);
        
        $form= new Form;
        
        $form->nome=$request->input('nome');
        $form->cpf=$request->input('cpf');
        $form->email=$request->input('email');
        $form->perfil=$request->input('perfil');
        $form->endereco=$request->input('endereco');
      
        $form->save();
       
        return redirect('/listar');   
    }
    
    //Listando os dados
    public function show(){
        
       $forms= Form::all();
       return view('listar',['forms'=>$forms]);
        
    }
    
    //Excluindo item da lista
    public function destroy($id){
        
        $form=Form::findOrFail($id);
        $form->delete();  
        return redirect('/listar');
    }
    
    //Editando item da lista
    public function edit($id){
        
        $form=Form::findOrFail($id);
        return view('editar',['form'=> $form] );    
    }
    
    //Atualizando dados da lista depois de ser editado
    public function update(Request $request,$id){
            
        //Validando campos depois de editado
        $validacao=$request->validate([
            'nome'=>'required',
            'cpf'=>'required',
            'email'=>'required',
            'perfil'=>'required',
            'endereco'=>'required',    
        ]);
        
         $form=Form::findOrFail($id);
         
         $form->update([
             'nome'=>$request->nome,
             'cpf'=>$request->cpf,
             'email'=>$request->email,
             'perfil'=>$request->perfil,
             'endereco'=>$request->endereco,
             
         ]);
         return redirect('/listar');
    }
    
    //Buscando dados da lista
    public function search(){
        
        $search=request('search');
        $cpf=request('cpf');
           
        if($search){
            
            $forms=Form::where('nome','LIKE','%'.$search.'%')->get();  
            
        }else if($cpf){
            
            $forms=Form::where('cpf','LIKE','%'.$cpf.'%')->get(); 
            
        }else{
            
            $forms=Form::all();
        }
        return view('search',['forms'=>$forms,'search','cpf']); 
    }
}