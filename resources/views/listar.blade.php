<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <meta  name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Lista de cadastrados</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    
    <!-- Menu -->
    <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('') }}">Home</a>
                    <a class="navbar-brand" href="{{ url('listar') }}">Lista</a>
                </div>
            </div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">           
            <div class="col md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
    
                            <h1>Lista de Cadastrados</h1> 
                            
                        </div>
                    </div>
        
                    <!-- Campos de Busca ou por Nome ou CPF-->
                    <form action="{{url('/search')}}" method="get">
                        @csrf
                        <br><label>Nome:</label>
                            <input type="text" name="search">
                         <label>CPF:</label>
                            <input type="text" name="cpf">
                            <button class="btn btn-info" type="submit">Filtrar</button>
                    </form>
    
                    <!-- Listando -->
                    <body>
                       <br>
                        <table class='table table-striped table-hover'>  
                            <thead>
                               <tr>
                                  
                                  <th>Nome</th>
                                  <th>CPF</th>
                                  <th>Email</th>
                                  <th>Perfil</th>
                                  <th>Endereco</th>
                                  <th>Outros</th>
                                  <th>Ações</th>
                                </tr>
                            </thead>
          
                        <tbody>
                            @foreach($forms as $form)
                            <tr>
                                <td>{{$form->nome}}</td>
                                <td>{{$form->cpf}}</td>
                                <td>{{$form->email}}</td>
                                <td>{{$form->perfil}}</td>
                                <td>{{$form->endereco}}</td>
                            
                                @foreach($enderecos as $end)
                                
                                    <td>{{$end->outros_enderecos}}</td>

                                <td>
                                    @csrf
                                    <!-- Opcões de Editar ou excluir da lista -->
                                   <a href="{{route('form.editar',['id'=>$form->id])}}"
                                      title="Editar Cadastro {{$form->nome}}"><button class="btn btn-success" type="submit">Editar</button></a>
                          
                                      
                                   <a href="{{route('form.destroy',['id'=>$form->id])}}"
                                      title="Excluir cadastro {{$form->nome}}"><button class="btn btn-danger" type="submit">Excluir</button></a>
                                </td> 
                            </tr>
                                 @endforeach
                                 
                            @endforeach  
                            
                        </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    </body>
</html>
