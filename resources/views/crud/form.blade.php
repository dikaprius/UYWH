@extends('layouts.main')
@section('subcontent')
<div class="container">

  <h2 style="margin-left: 380px;">Input </h2></br>
  <form class="" action="{{ url('file') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Name">Name:</label>
        <input type="text" class="form-control" name="title" required>
      </div>
    </div>

    <div class="row">
     <div class="col-md-4"></div>
       <div class="form-group col-md-4">
         <input type="file" name="filename">
       </div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Name">Harga Barang:</label>
        <input onkeypress="return isNumberKey(event)" id="amount" type="text" class="form-control" name="harga_barang" maxlength="15"  required>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label for="Name">Description </label>
        <textarea class="form-control" placeholder="Write Description ..." name="Description" ></textarea>
      </div>
    </div>

    <div class="row">
     <div class="col-md-4"></div>
       <div class="form-group col-md-4">
           <lable>Jenis Barang</lable>
           <select name="kode_barang" required>
             <option value=""></option>
             <option value="Man">Man</option>
             <option value="Woman">Woman</option>
             <option value="Accessories">Accessories</option>
             <option value="Bag">Bag</option>
           </select>
       </div>
   </div>

   <div class="row">
     <div class="col-md-4"></div>
       <div class="form-group col-md-4" style="margin-top:60px">
         <button type="submit" class="btn btn-success">Submit</button>
       </div>
   </div>

  </form>

</div>

<script type="text/javascript">
    function isNumberKey(event){
      var charCode = (event.which) ? event.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
      }
</script>
@endsection
