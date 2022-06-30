<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Endereco;
use App\Models\Perfil;
use DB;
use App\Http\Requests\StoreUpdateCadFormRequest;

class FormularioController extends Controller
{
   //Adicionando os dados do formulário a uma lista
    public function store(Request $request){
        
        //Validando campos
        $validacao=$request->validate([
            'nome'=>'required',
            'cpf'=>'required',
            'email'=>'required',
            'perfil'=>'required',
            'endereco'=>'required',  
        ]);
        
        //Pegando dados inseridos e salvando na tabela formulário
        $form= new Form;      
            
        $form->nome=$request->input('nome');
        $form->cpf=$request->input('cpf');
        $form->email=$request->input('email');
        $form->perfil=$request->input('perfil');
        $form->endereco=$request->input('endereco');  
        $form->save(); 

        //Salvando dados da tabela Endereco
        $endereco=new Endereco;
        $endereco->outros_enderecos=$request->input('outros_enderecos');
        
        //Associando a tabela Formulário e Endereco
        $endereco->form()->associate($form);
        $endereco->save(); 
        
        //Adicionando dados na tabela Perfil
        $perfil= new Perfil;
        $perfil->senha=$request->input('senha');
        
        //Associando a tabela Formulário e Perfil
        $perfil->form()->associate($form);
        $perfil->save();
            
        //Direcionando ao listar
        return redirect('/listar');   
    }

    //Listando os dados
    public function show(){
          
       //Buscando dados do Formulário e do Endereco
       $forms= Form::all();
       $enderecos=Endereco::all();
       //Retornando dados da busca para listar
       return view('listar',['forms'=>$forms],['enderecos'=>$enderecos]);
        
    }
    
    //Excluindo item da 
    //
    public function destroy($id){
        
        $form=Form::findOrFail($id);
        $form->enderecos()->delete();
        $form->delete();
         
        //Direcionando ao listar
        return redirect('/listar');
    }
    
    
    //Editando item da lista
    public function edit($id){
        
        //Buscando da tabela formulário pelo Id
        $form=Form::findOrFail($id);
        
        //Direcionando dados para o editar
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
        
         //Buscando dados da tabela formulário pelo id
         $form=Form::findOrFail($id);
         
         
         //Atualizando dados
         $form->update([
             'nome'=>$request->nome,
             'cpf'=>$request->cpf,
             'email'=>$request->email,
             'perfil'=>$request->perfil,
             'endereco'=>$request->endereco,
             
         ]);
         
         $endereco=Endereco::findOrFail($id);
         
         $endereco->update([
             'outros_enderecos'=>$request->outros_enderecos
         ]);
         //Retornando dados para listar
         return redirect('/listar');
    }
    
    //Buscando dados da lista
    public function search(){
        
        $search=request('search');
        $cpf=request('cpf');
           
        //Retorno ao inserir busca por por nome 
        if($search){
            
            $forms=Form::where('nome','LIKE','%'.$search.'%')->get();  
            
        //Retorno ao inserir busca por por CPF
        }else if($cpf){
            
            $forms=Form::where('cpf','LIKE','%'.$cpf.'%')->get(); 
            
        //Retorno caso não seja feita a busca por nome ou CPF
        }else{
            
            $forms=Form::all();
        }
        return view('search',['forms'=>$forms,'search','cpf']); 
    }
}