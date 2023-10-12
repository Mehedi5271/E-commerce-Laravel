<x-master :categories='$categories'>
    <x-slot:title>
        E-Shop | Product Details
    </x-slot>
  
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
            <div class="card shadow-sm">
              <img style="height: 125px weight:100%" src="{{asset('storage/images/'.$product->image)}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text"></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        </div>
                        <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex">
      
      {{-- {{ $products->links() }}  --}}
    </div>
  </x-master>
  