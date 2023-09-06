<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
   <nav>
    <a href="{{route('about')}}">About</a> <br>
    <a href="{{route('mehedi')}}">Mehedi</a> <br>
    <a href="{{route('user')}}">User Information</a>
   </nav>
    <h1>This is user Information </h1>

   
    
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $info)
              <tr>
               
                <td>{{$info->id}}</td>
                <td>{{$info->name}}</td>
                <td>{{$info->email}}</td>
              
              </tr>
             
            </tbody>
            @endforeach
          </table>
</body>
</html>