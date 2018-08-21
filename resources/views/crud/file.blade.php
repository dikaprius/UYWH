@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload New File</div>
                <div class="panel-body">
                    @include('session')
                    <p>
                      <a href="{{ url('file/create') }}" class="btn btn-primary">Upload File</a>
                      <a href="{{ url('archive') }}" class="btn btn-primary">Archived Files</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th style="text-align:center;">Path</th>
                                    <th colspan="3" style="text-align:center;">Action</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($file as $files)
                                    <tr>
                                        <td>{{ $files->title }}</td>
                                        <td>{{ $files->harga_barang }}</td>
                                        <td>{{ $files->filename }}</td>
                                        <td><a href="{{ url('images/'.$files->filename) }}" class="btn btn-primary" data-lightbox="roadtrip" data-title="{{ $files->title }}">View</a></td>
                                        <td>
                                          <button type="submit" name="_edit" class="btn btn-warning" data-target="#editModal" data-toggle="modal" > Edit</button>
                                          <!-- Modal -->
                                              <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="editFile">Edit File</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    Are you Sure Want To Edit This File ?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                      <a href="{{ action('FileController@edit', $files['id']) }}" name="edit" class="btn btn-primary"> Yes</a>
                                                  </div>
                                                </div>
                                              </div>
                                              </div>

                                        </td>
                                        <td>
                                            <button type="submit" name="_delete" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">delete</button>

                                            <!-- Modal -->
                                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="deleteFile">Delete File</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      Are you Sure ?
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                                      <form action="{{ action('FileController@destroy', $files['id']) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <input type="submit" value="Yes" name="delete"  class="btn btn-primary">
                                                      </form>
                                                    </div>
                                                  </div>
                                                </div>
                                                </div>
                                              </td>
                                        <td>{{ $files->created_at->diffForHumans() }}</td>
                                    </tr>
                                  @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="Pagination">
                    {{ $file->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
