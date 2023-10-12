<x-master >
    <x-slot:title>
        E-Shop | Product Details
    </x-slot>
  
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img style="height: 225px; width: 100%;" src="{{asset('storage/images/'.$product->image)}}" alt="">
            </div>
        </div>
        <div class="col-md-8">
            <h1 class="card-title">{{ $product->title }}</h1>
            <p  class="card-title"> Price: {{ $product->price }}</p>
            <hr> <!-- Place the <hr> tag here to separate the image -->
            <p class="card-text"></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
                <small class="text-muted"></small>
            </div>
            <p>{{ $product->description }}</p>
        </div>
    </div>
</x-master>
