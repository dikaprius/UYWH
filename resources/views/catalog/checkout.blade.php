@extends('layouts.main')
@section('content')

<div class="grid-container2">
  <img id="zoom" src="{{ asset ('/images/'. $barang->filename) }}" alt="{{$barang->title}}" class="image2" data-zoom-image="{{ asset('/images/'. $barang->filename) }}"/>
    <div class="Description">
      <section class="first-section">
          <h3 id="file_id" data-id="{{$barang->id}}">{{ $barang->title }}</h3>
          <div class="title-flex">
            <h4 id="harga_barang" data-harga="{{$barang->harga_barang}}" class="red">Rp. {{ number_format($barang->harga_barang,0,",",".") }}</h4>
            <form class="red" action="#" method="post">
              <input type="checkbox" name="wishlist" id="wishlist_1" data-toggle="modal"  data-target="#wishlist" value="Add To Wishlist">
              <label class="form-check-label" for="wishlist_1">
                Add To Wishlist
              </label>
            </form>
          </div>
          <!-- Wishlist Modal -->
          <div class="modal fade" id="wishlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="wishlist_title">Add To Wishlist</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 Do you want to add to wishlist ?
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary">Yes</button>
               </div>
             </div>
            </div>
            </div>
      </section>
      <section class="first-section">
        <form class="down-space" action="#" method="post">
          @csrf
          <label>Amount : </label>
          <input onkeypress="return isNumberKey(event)" id="amount" type="integer" name="Amount" value="1" min="1" maxlength="3" class="amount-input">
        </form>
         <!-- Button trigger modal -->
          <button type="button" class="btn btn-secondary btn-md down-space right" data-toggle="modal" data-target="#BuyNow">
            Buy Now
          </button>
          <button type="button" class="btn btn-warning btn-md down-space right" data-toggle="modal" data-target="#ShoppingChart">
            Shopping Cart
          </button>
            <!-- Buy Now Modal -->
            <div class="modal fade" id="BuyNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="BuyNow_title">Buy Now</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   Are you sure to buy this thing ?
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-primary bact" name="buy">Yes</button>
                 </div>
               </div>
              </div>
              </div>
              <!-- Shopping Chart Modal -->
              <div class="modal fade" id="ShoppingChart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="shoppingCart_title">Shopping Chart</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     Do you want to add this to your cart ?
                   </div>
                   <div class="modal-footer">
                     <button type="button" id="clsBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary bact" name="shopCart">Yes</button>
                   </div>
                 </div>
                </div>
                </div>
      </section>
      <h2>Description</h2>
        <p class="Description1">{!! nl2br(e($barang->Description)) !!}</p>
    </div>
</div>

  <script type="text/javascript">

    $("#zoom").elevateZoom();

  </script>

  <script type="text/javascript">


        $(document).on('click','.bact', function(){
          var btn_name = $(this).attr('name')
          if (btn_name == "buy" || btn_name == "shopCart") {
            var urlname = "{{route('catalog.shopcart.post')}}"
          }
          $.ajax({
            url: urlname,
            dataType:'JSON',
            type:'POST',
            data:{
              fileId:$('#file_id').attr('data-id'),
              harga_barang:$('#harga_barang').attr('data-harga'),
              name: btn_name,
              jumlah: $('input[name="Amount"]').val()
            },
            error:function(data){
              alert(data.responseJSON.message+ "line "+ data.responseJSON.line+".\n File" +data.responseJSON.file);

            }
          }).done(function(data){
            if(data.url){
              location.href = data.url
            } else{
              if (btn_name == "buy"){
              location.href = data.cartUrl
              }else{
                alert(data.desc)
                console.log(data)
                $('#clsBtn').trigger('click')
              }
            }
          })
        })

        function isNumberKey(event){
          var charCode = (event.which) ? event.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
          }

  </script>

@endsection
