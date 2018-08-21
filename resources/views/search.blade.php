@extends('layouts.main')
@section('content')



<div class="container">
  <div class="row">

      @if(count($files) > 0)
         @foreach($files as $file)
           <div class="content col-md-4">
               <a href="{{ url('catalog/checkout/'.$file->id) }}" data-title="{{ $file->title }}" style="width:30%;">
                 <div class="content-overlay"></div>
                 <img src="{{  asset ('/images/'. $file->filename) }}" alt="{{ $file -> title }}" class="image">
                 <div class="content-details fadeIn-top">
                   <h3>{{ $file->title}}</h3>
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
        {{ $files -> links() }}
    </div>

</div>
@endsection
