<x-master>
    <x-slot:title>
        E-Shop | Cart Products
    </x-slot>
  
    <table class="table table-striped" >
        <thead>
            <th></th>
            <th>Serial</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </thead>
        <tbody>
            @foreach (auth()->user()->cartProducts as $cartProduct)
                
            <tr>
                <td><span class="btn  btn-sm btn-danger me-2 remove-btn">x</span></td>
                <td>  {{$loop->iteration}} </td>
                <td>{{$cartProduct->product->title}} {{$cartProduct->color ? '-'.$cartProduct->color->name:null}} </td>
                <td> {{$cartProduct->quantity}} </td>
                <td> {{$cartProduct->product->price}} </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <script>
        alert('hello');
    </script>
</x-master>
