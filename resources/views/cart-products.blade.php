<x-master>
    <x-slot:title>
        E-Shop | Cart Products
    </x-slot>
  
    <table class="table table-striped" >
        <thead>
            <th>Serial</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </thead>
        <tbody>
            @foreach (auth()->user()->cartProducts as $cartProduct)
                
            <tr>
                <td>{{$loop->iteration}} </td>
                <td>{{$cartProduct->product_id}} </td>
                <td> {{$cartProduct->qty}} </td>
                <td> 0 </td>
            </tr>
        </tbody>
        @endforeach


    </table>
</x-master>
