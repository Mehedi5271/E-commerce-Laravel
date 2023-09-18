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
                Product Information <a href="{{route('product.index')}}" class="btn btn-sm btn-outline-primary">List</a>
            </div>

            
            <div class="card-body">
              <h1>Title: {{$product->title}}</h1>
              <p>Price: {{$product->price}}</p>
              <p>Description: {{$product->description}}</p>
              <p>Active: {{$product->is_active?'Active':'Disable'}}</p>
              <p>Image: <img style="height: 100px" src="{{asset('storage/images/'.$product->image)}}" alt=""> </p>
            </div>
        </div>
    </div>
</main>
    
@endsection