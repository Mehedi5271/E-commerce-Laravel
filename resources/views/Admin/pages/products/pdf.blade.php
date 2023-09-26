<table border="1" >
    <thead>
        <tr>
            <th>Serial</th>
            <th>Title</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td> {{$loop->iteration}}  </td>
            <td> {{$product->title}} </td>
        </tr>
            
        @endforeach
       
    </tbody>
</table>