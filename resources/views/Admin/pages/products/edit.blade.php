@extends('Admin.layout.master')

@section('title')
Add Product
@endsection

@section('content')
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
    <div class="card-body">

        {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


        <form action="{{route('product.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $categoryID=>$categoryTitle)
                            <option 
                            value="{{$categoryID}}"
                             @if($product->category_id == $categoryID) 
                             selected 
                             @endif 
                             >{{$categoryTitle}}</option>     
                            @endforeach

                        </select>
                        <label for="category_id">Category</label> <br>
                        @error('category_id')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="title" id="title" type="text" placeholder="Enter Title" value="{{ old('title',$product->title )}}" />
                        <label for="inputFirstName">Title</label> <br>
                        @error('title')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="price" id="price" type="number" placeholder="Enter Price"value="{{ old('price',$product->price) }}" />
                        <label for="price">Price</label> <br>
                        @error('price')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <textarea  class="form-control" name="description" id="description" id="description" >{{old('description',$product->description)}}</textarea>
                <label for="description">Description</label> <br>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <img style="height: 100px" src="{{asset('storage/images/'.$product->image)}}" alt="">
            <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" name="image" id="price" type="file" accept="image/*" />
                <label for="image">Image</label> <br>
                @error('image')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <label for="image">Color</label> <br>
            <div class="form-floating mb-3 mb-md-0">
                @foreach ($colors as $colorId => $colorName)
                    
                
                <div class="form-check">
                    <input 
                    class="form-check-input" 
                    name="color_id[]" 
                    type="checkbox" 
                    value="{{$colorId}}" 
                    id="{{$colorId}}" 
                    @if (in_array($colorId,$selectedColorIds))
                    checked
                        
                    @endif

                    >
                    <label class="form-check-label" for="{{$colorId}}">{{$colorName}}</label>
                </div>
                @endforeach

            <div class="form-check">
                <input class="form-check-input" name="is_active" type="checkbox" value="1" id="is_active" checked>
                <label class="form-check-label" for="is_active">Is Active</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
