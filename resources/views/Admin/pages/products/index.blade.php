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
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Status</th>
                           
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        @foreach ($products as $product)
                        
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->is_active}}</td>
                        </tr>
                
                        @endforeach
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
    
@endsection