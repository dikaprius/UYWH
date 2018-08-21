@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading h1 ">ARCHIVED DATA</div>
                <div class="panel-body">
                    @include('session')
                    <h5 class="msg"></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th style="text-align:center;">Path</th>
                                    <th colspan="3" style="text-align:center;">Action</th>
                                    <th>Deleted At</th>
                                </tr>
                            </thead>

                              @if(count($file) > 0)
                              @foreach($file as $files)
                              <tbody>
                                    <tr class="{{$files->id}}">
                                        <td>{{ $files->title }}</td>
                                        <td>{{ $files->harga_barang }}</td>
                                        <td>{{ $files->filename }}</td>
                                        <td><a href="{{ url('images/'.$files->filename) }}" class="btn btn-primary" data-lightbox="roadtrip" data-title="{{ $files->title }}">View</a></td>

                                        <td>
                                            <button type="submit" name="_delete" value="Delete" data-id="{{ $files->id }}" class="btn btn-danger" id="fdelete">delete</button>
                                        </td>
                                        <td>
                                            <button type="submit" name="restore" class="restore btn btn-warning" data-id="{{ $files->id }}" >restore</button>
                                        </td>
                                        <td>{{ $files->deleted_at->diffForHumans() }}</td>
                                    </tr>

                              </tbody>
                                  @endforeach

                        </table>
                    </div>
                    @else
                         <tr>
                             <h2 colspan="3" class="text-danger">Result not found.</h2>
                         </tr>
                    @endif
                    <div class="Pagination">
                    {{ $file->links() }}
                    </div>
                </div>
                  <script type="text/javascript">
                    $('.restore').on('click', function(){
                      if(confirm("Are you sure to restore this file ? ")){
                        $.ajax({
                          url: "{{ route('archive') }}",
                          dataType: "JSON",
                          type: "POST",
                          data: {
                            id: $(this).attr('data-id')
                          },
                          error: function(data){
                            alert(data.responseJSON.message)
                          }
                        }).done(function(data){
                          if(data.desc == "ok"){
                            $('.msg').text(data.message)
                            location.reload()
                          }
                        })
                      }
                    })

                    $('#fdelete').on('click', function(){
                      if(confirm('Are You Sure To Delete it Permanently ?')){
                        $.ajax({
                          url: "{{ route('forceDelete') }}",
                          dataType: "JSON",
                          type: "DELETE",
                          data:{
                            id: $(this).attr('data-id')
                          },
                          error: function(data){
                            alert(data.responseJSON.message)
                          }
                        }).done(function(data){
                          if(data.desc == 'ok'){
                            $('.'+data.id).remove()
                            // location.reload()
                          }
                        })
                      }
                    })

                    $('table').each(function(){
                        var row = $(this).find('tr > td').length;
                        if(row < 1){
                           $(this).hide();
                        }
                    })
                  </script>
            </div>
        </div>
    </div>
</div>
@endsection
