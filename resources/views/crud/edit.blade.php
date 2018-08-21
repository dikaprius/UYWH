@extends('layouts.main')
@section('subcontent')
<div class="container">

  <h2>Input </h2></br>
  <form class="" action="{{ action('FileController@update', $files->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Name">Name:</label>
        <input type="text" class="form-control" name="title" value="{{  $files->title  }}" required>
      </div>
    </div>

    <div class="row">
     <div class="col-md-4"></div>
       <div class="form-group col-md-4">
         <input type="file" name="filename" value=" {{ $files->filename }} " required>
       </div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Name">Harga Barang:</label>
        <input type="text" class="form-control" name="harga_barang" value="{{ $files->harga_barang }}" required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Name">Description </label>
        <textarea class="form-control"  name="Description" value="{{ $files->Description }}" ></textarea>
      </div>
    </div>

    <div class="row">
     <div class="col-md-4"></div>
       <div class="form-group col-md-4">
           <lable>Jenis Barang</lable>
           <select name="kode_barang">
             <option value="Man" @if($files->kode_barang=="Man") selected @endif>Man</option>
             <option value="Woman"@if($files->kode_barang=="Woman") selected @endif>Woman</option>
             <option value="Accessories"@if($files->kode_barang=="Accessories") selected @endif>Accessories</option>
             <option value="Bag"@if($files->kode_barang=="Bag") selected @endif>Bag</option>
           </select>
       </div>
   </div>

   <div class="row">
     <div class="col-md-4"></div>
       <div class="form-group col-md-4" style="margin-top:60px">
         <button type="submit" class="btn btn-success">Submit</button>
         <a class="btn btn-danger" href="{{ url('file') }}"> Cancel</a>
       </div>
   </div>

  </form>

</div>
@endsection
