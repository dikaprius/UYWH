@extends('layouts.main')
@section('content')


<div class="container" id="select-category">
  <section class="m-banner  m-banner--section ">
    <div class="wrap ">
      <div class="trow m-banner__wrapper">
        <div class="wrapper__placeholder"></div>
        <img src="https://dj7u9rvtp3yka.cloudfront.net/layout/banners/promotions/New_Divider0305/Web_version-12p0-en_v6.png" alt="Banner image" class="banner">
      </div>
    </div>
  </section>

  <!-- <div class="row"> -->
    <div class="grid-container3">
    <a href="{{ route('category.filter',['nama_barang' => 'Man']) }}"> <div class="item" style="border-right: solid 1px rgba(213, 217,220,1) ;"> Man's </div></a>
    <a href="{{ route('category.filter',['nama_barang' => 'Woman']) }}"> <div class="item"> Woman's </div></a>
    <a href="{{ route('category.filter',['nama_barang' => 'Accessories']) }}"> <div class="item" style="border-right: solid 1px rgba(213, 217,220,1);"> Accessories </div></a>
    <a href="{{ route('category.filter',['nama_barang' => 'Bag']) }}"> <div class="item"> Bag </div></a>
    </div>
  <!-- </div> -->
    <div class="sliders">
      <div><img src="{{ asset('logos/logo.jpg') }}" alt="" class="image-slide"> </div>
      <div><img src="{{ asset('logos/logo1.gif') }}" alt="" class="image-slide"></div>
      <div><img src="{{ asset('logos/logo2.png') }}" alt="" class="image-slide"></div>
      <div><img src="{{ asset('logos/logo3.png') }}" alt="" class="image-slide"></div>
      <div><img src="{{ asset('logos/logo4.jpg') }}" alt="" class="image-slide"></div>
      <div><img src="{{ asset('logos/logo5.jpg') }}" alt="" class="image-slide"></div>

    </div>
</div>

    <script type="text/javascript">

    $(document).ready(function(){
      $('.sliders').slick({
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 4,
        variableWidth: true,
        centerMode:true
      });
    });

    </script>
    <script type="text/javascript" src="https//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
@endsection


@section('subcontent')

    <div class="container">
        <div class="row">
      @foreach( $files as $barang )
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
      </div>
      <div class="Pagination">
        {{ $files -> links() }}
      </div>
    </div>

@endsection
