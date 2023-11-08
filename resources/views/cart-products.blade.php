<x-master>
    <x-slot:title>
        E-Shop | Cart Products
    </x-slot>

   
 <form action="{{ route('order-store') }}" method="post">
    @csrf
  
    <table class="table table-striped" >
        <thead>
            <th></th>
            <th>Serial</th>
            <th>Product</th>
            <th>Quantity</th>
            <th class="text-center"> Unit Price</th>
            <th class="text-center">Total Price</th>
        </thead>
        <tbody>
            @foreach (auth()->user()->cartProducts as $key=> $cartProduct)
                
            <tr>
                <td>
                    <input type="hidden" name="products[{{$key}}][cart_product_id]" value="{{$cartProduct->id}}"/>
                    <span class="btn  btn-sm btn-danger me-2 remove-btn" data-id="{{$cartProduct->id}}">x</span></td>
                <td>  {{$loop->iteration}} </td>
                <td>{{$cartProduct->product->title}} {{$cartProduct->color ? '-'.$cartProduct->color->name:null}} </td>
                <td style="width:200px" >  
                    <div class="input-group">
                    <div class="input-group-text minus-btn">-</div>
                    <input type="number" 
                    class="form-control qty" 
                    value="{{$cartProduct->quantity}}"
                    placeholder="Qty" 
                   name="products[{{$key}}][qty]">
                    <div class="input-group-text plus-btn">+</div>
                </td>

                  {{-- </div> <input type="number" class="qty" name="" id="" value="{{$cartProduct->quantity}}"> </td> --}}
                   <td class=" text-end unit-price"> {{$cartProduct->product->price}} </td>
                   <td class=" price text-end"> {{$cartProduct->quantity*$cartProduct->product->price}} </td>
            </tr>
        </tbody>
        @endforeach
        <tr>
            <td colspan="5"></td>
            <td class="text-end">Total: <span id="total_price">0</span></td>
        </tr>
    </table>
    <h2 class="text-center">Confirm Your Oder</h2>

    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" name="contact_number" placeholder="Contact Number">
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="shipping_address" placeholder="Shipping Address">
        </div>
    </div>
    <div class="mt-3">
        <button class="btn btn-primary" type="submit">Place Order</button>
    </div>

</form>


   @push('script')
   <script>
    const removeBtn = document.querySelectorAll('.remove-btn');
    removeBtn.forEach(function(btn){
        btn.addEventListener('click', function(){

            const id =btn.getAttribute('data-id');

            fetch('/cart-products/'+id, {
            method: 'DELETE',
            
            headers: {
                     'X-CSRF-TOKEN': '{{csrf_token()}}'
                      }

                 })
                 .then(res => res.json()) 
                 .then(data=>{
                    if(data.success==true){
                        btn.parentElement.parentElement.remove();
                        updateTotalPrice();
                        alert(data.message)
                    } else{
                        alert('somethings went wrong') 
                    }

                    })
            .catch(err => console.log(err));

           
        })            
    }) 
    updateTotalPrice()
   function updateTotalPrice()
   {
    const priceElement = document.querySelectorAll('.price');
    let totalPrice = 0; 
    priceElement.forEach(function(element){
        totalPrice += parseFloat(element.innerText);
      document.getElementById('total_price').innerText=totalPrice
    }) 
   }  

   const plusBtn = document.querySelectorAll('.plus-btn');
   plusBtn.forEach(function(btn){
    btn.addEventListener('click', function(){
        const qtyInput = this.previousElementSibling;
        const updateQty = parseInt(qtyInput.value)+1;
        qtyInput.value = updateQty;
       const unitPriceElement = qtyInput.parentElement.parentElement.nextElementSibling;
       const updatePrice = parseFloat(unitPriceElement.innerText)*updateQty;

       unitPriceElement.nextElementSibling.innerText = updatePrice;
        updateTotalPrice()

    });
   })

   const minusBtn = document.querySelectorAll('.minus-btn');
    minusBtn.forEach(function(btn){
    btn.addEventListener('click', function(){
        const qtyInput = this.nextElementSibling;
        if(qtyInput.value == 1 ){
            alert('minimum quantity 1');
            return;
        }
        const updateQty = parseInt(qtyInput.value)-1;
        qtyInput.value = updateQty;
       const unitPriceElement = qtyInput.parentElement.parentElement.nextElementSibling;
       const updatePrice = parseFloat(unitPriceElement.innerText)*updateQty;

       unitPriceElement.nextElementSibling.innerText = updatePrice;
        updateTotalPrice()

    });
   })



     </script>
       
   @endpush
</x-master>
