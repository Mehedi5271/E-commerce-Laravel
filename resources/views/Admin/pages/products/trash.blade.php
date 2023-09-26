@extends('Admin.layout.master')

@section('title')
Product
    
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
                Product Information <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-info"> List</a>
            </div>
            

            
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Status</th>
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
                        
                        @foreach ($products as $product)
                        
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}}</td>
                            {{-- <td>{{$product->description}}</td> --}}
                            <td>{{$product->is_active}}</td>
                            <td>
                                <form style="display: inline" action="{{route('product.restore', $product->id)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-sm btn-warning" type="submit" onclick="return confirm('Are you sure you want to Restore?')" >Restore</button>
                                </form>

                                <form style="display: inline" action="{{route('product.destroy', $product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete permanently ?')" >Delete</button>
                                
                                </form>

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