@extends('Admin.layout.master')

@section('title')
Add Product
@endsection

@section('content')
<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
    <div class="card-body">
        <form action="{{route('product.store')}}" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="title" id="title" type="text" placeholder="Enter Title" />
                        <label for="inputFirstName">Title</label> <br>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="price" id="price" type="number" placeholder="Enter Price" />
                        <label for="price">Price</label> <br>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" id="description"></textarea>
                <label for="description">Description</label> <br>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="is_active" type="checkbox" value="" id="is_active" checked>
                <label class="form-check-label" for="is_active">Is Active</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><a class="btn btn-primary btn-block" href="login.html">Create Account</a></div>
            </div>
        </form>
    </div>
    <div class="card-footer text-center py-3">
        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
    </div>
</div>
@endsection
