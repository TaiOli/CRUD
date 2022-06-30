<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <meta  name="viewport" content="width=device-width,initial-scale=1.0"><!-- comment -->
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Formulario de Edição</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
    </head>
    
    <!-- Menu -->
    <body>  
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('') }}">Home</a>
                    <a class="navbar-brand" href="{{ url('listar') }}">Lista</a>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center"> 
            <div class="col md-12">
                <!--Mensagem de erro de validação dos campos  -->
                 @if($errors->any())
                        <div class='alert alert-danger'>
                            <ul>
                               @foreach($errors ->all() as $error)
                                  <li>Preencha todos os campos!</li>
                               @endforeach
                            </ul>
                        </div>
                    @endif                 
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-center">                 
                            <br><h1>Editar cadastro</h1></br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Campos para editar dados da lista -->
        <div class='container'>       
            <form action="{{ route('form.atualizar',['id'=> $form->id]) }}" method="post">
            @csrf
            
            <br>
             <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" value="{{$form->nome}}" class="form-control">
             </div>
            
            <div class="form-group">
                <label>CPF:</label>
                <input type="text" name="cpf" value="{{$form->cpf}}" class="form-control"><!-- comment -->
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" value="{{$form->email}}" class="form-control"><!-- comment -->
            </div>
            
            <div class="form-group">
                <label>Perfil:</label>
                <input type="text" name="perfil" value="{{$form->perfil}}" class="form-control"><!-- comment -->
            </div>
            
            <div class="form-group">
                <label>Endereco:</label>
                <input type="text" name="endereco" value="{{$form->endereco}}" class="form-control"><!-- comment -->
            </div>
            
            <button class="btn btn-primary">Salvar</button>
        </form>
        </div>
    </body>
</html>