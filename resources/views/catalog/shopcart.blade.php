@extends('layouts.main')
@section('content')

<div class="container">

<h5 class="msgInfo red col-md-6"> </h5>
      @if(count($carts) > 0)
         @foreach($carts as $cart)
           <div class="content col-md-6 border grid-container2 {{$cart->id}}">
             <img src="{{ asset('/images/'.$cart->file->filename) }}" alt="" class="cartImage border-right">
               <div class="flex">
                 <p class="padding">{{ $cart->file->title }}</p>
                 <p class="padding">{{ $cart->jumlah_barang }} pcs</p>
                 <h4 class="red padding">Rp. {{ number_format($cart->file->harga_barang) }}</h4>
               </div>
               <button name="_delete" class="btn btn-danger delete fa fa-close" data-id="{{$cart->id}}"></button>

               <!-- DELETE Function -->
                       <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                       <form action="{{ action('CartController@delete', $cart['id']) }}" method="post">
                         {{ csrf_field() }}
                         {{ method_field('delete') }}
                         <input type="submit" value="Yes" name="delete"  class="btn btn-primary">
                       </form>         -->
           </div>

         @endforeach
           <div class="content col-md-6 border grid-container2">
              <h3 class="padding">TOTAL</h3>
              <h4 class="red flex total padding">Rp. {{ number_format($total) }}</h4>
           </div>
           <div class="col-md-6 grid-container2">
              <button type="submit" class="centering btn btn-success" name="BuyNow"> Buy Now</button>
           </div>
      @else
           <tr>
               <h2 colspan="3" class="text-danger">Result not found.</h2>
           </tr>
      @endif
</div>

<script type="text/javascript">
  $('.delete').on('click', function(){
    if(confirm("Are You Sure ?")){
      $.ajax({
        url: "{{url('/catalog/cart-delete')}}",
        dataType:'JSON',
        type:'POST',
        data:{
          id:$(this).attr('data-id')
        },
        error:function(data){
          alert(data.responseJSON.message+ "line "+ data.responseJSON.line+".\n File" +data.responseJSON.file);

        }
      }).done(function(data){
          if(data.desc){
            $('.'+data.id).remove()
            $('.total').text(data.total)
            $('.msgInfo').text(data.message)
          }
          console.log(data)
          location.reload()
      })
    }
  })
</script>
@endsection
