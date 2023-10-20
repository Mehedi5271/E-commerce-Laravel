<x-master>
    <x-slot:title>
        E-Shop | Product Details
    </x-slot>
  
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img style="height: 225px; width: 100%;" src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->title }}">
            </div>
        </div>
        <div class="col-md-8">
            <h1 class="card-title">{{ $product->title }}</h1>
            <p class="card-title">Price: {{ $product->price }}</p>
            <hr> <!-- Place the <hr> tag here to separate the image -->
            <p class="card-text"></p>
            <form action="{{route('cart.store')}}" method="POST">
                @csrf 
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <input type="hidden" name="" value="{{$product->id}}">
                        Quantity: <input type="number" name="Quantity" placeholder="Quantity" required>
                        Color:
                        <select name="color_id" required>
                            @foreach ($product->colors as $color)
                                <option class={{ $color->id }}>{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit"  class="btn btn-sm btn-outline-primary">ADD TO CART</button>
                    </div>
                </div>
            </form>
            
            {{-- <p>{{ $product->description }}</p> --}}
        </div>
    </div>
</x-master>
