@extends('Admin.layout.master')

@section('title')
User List
    
@endsection


@section('content')
<main>
    <div class="container-fluid px-4">
       
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
           
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Users Information 
            

            
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Status</th>
                           
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        @foreach ($users as $user)
                        
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            {{-- <td>{{$product->description}}</td> --}}
                            <td>

                                {{-- <a class="btn btn-sm btn-warning" href="{{route('product.edit',['id'=> $product->id])}}">Edit</a> --}}
                              

                            </td>
                        </tr>
                
                        @endforeach
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
    
@endsection