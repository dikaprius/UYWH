@extends('layouts.main')
@section('content')



<div class="container">
  <div class="row">

      @if(count($barangs) > 0)
         @foreach($barangs as $barang)
           <div class="content col-md-4">
               <a href="{{ url('catalog/checkout/'.$barang->id) }}" data-title="{{ $barang->title }}" style="width:30%;">
                 <div class="content-overlay"></div>
                 <img src="{{  asset ('/images/'. $barang->filename) }}" alt="{{ $barang -> title }}" class="image">
                 <div class="content-details fadeIn-top">
                   <h3>{{ $barang->title}}</h3>
                   <p></p>
                 </div>
               </a>
            </div>
         @endforeach
      @else
           <tr>
               <h2 colspan="3" class="text-danger">Result not found.</h2>
           </tr>
      @endif
    </div>
    <div class="Pagination">
        {{ $barangs -> links() }}
    </div>
</div>

@endsection
