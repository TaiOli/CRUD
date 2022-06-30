<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <meta  name="viewport" content="width=device-width,initial-scale=1.0"><!-- comment -->
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Formulario</title>
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
                    
                    <!-- Mensagem de erro de validação de campos -->
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
                                <br><h1>Formulário</h1><br>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        
          <!-- Inserindo dados a tabela Formulário,Endereco e Perfil e salvando no banco -->
        <div class='container'>
            <form action="/forms"  method="get">
                    @csrf
                    <br>
                <div id="formulario">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="nome">
                    
                        <label>CPF:</label>
                        <input type="text" class="form-control" name="cpf">
                    
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email">
                    
                        <label>Perfil:</label>
                        <input type="text" class="form-control" name="perfil">
                        
                        <label>Endereco:</label>
                        <input type="text"  class="form-control" name="endereco">

                        <label>Outro Endereco:</label>                 
                        <input type="text"  class="form-control" name="outros_enderecos">
                        
                        <label>Senha:</label>                 
                        <input type="text"  class="form-control" name="senha">
                    </div>
                </div>       
                        <button class="btn btn-primary">Salvar</button>
        </div> 
    </body>   
</html>