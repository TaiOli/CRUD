<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta  name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Lista de usuarios cadastrados</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    
    <br><h1>Resultado da busca</h1></br>
    
    <!--Campos para buscar dados ou por Nome ou CPF -->
    <form action="{{url('/search')}}" method="get">
         @csrf
         <label>Nome:</label>
            <input type="text" name="search">
         <label>CPF:</label>
            <input type="text" name="cpf">
            <button type="submit">Filtrar</button>
    </form>
    
    <!-- Listando -->
    <body>
        <table class='table table-striped'>  
            <thead>
               <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Email</th>
                  <th>Perfil</th>
                  <th>Endereco</th>
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
                   <td>
                       
                       <!-- Opções para editar ou excluir dados da lista -->
                       <a href="{{route('form.editar',['id'=>$form->id])}}"
                       title="Editar Cadastro {{$form->nome}}"><button type="submit">Editar</button></a>

                       <a href="{{route('form.destroy',['id'=>$form->id])}}"
                       title="Excluir cadastro {{$form->nome}}"><button type="submit">Excluir</button></a>
                   </td>
                </tr>
                @endforeach
            </tbody>  
        </table>
    </body>
</html>
