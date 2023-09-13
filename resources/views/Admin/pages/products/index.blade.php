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
                Product Information <a href="{{route('product.creat')}}" class="btn btn-sm btn-outline-primary">Add Product</a>
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
                                <a href="{{route('product.edit',['id'=> $product->id])}}">Edit</a>
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