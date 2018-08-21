<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class FileController extends Controller
{

    public function __construct(){
      if(Auth::check() && Auth::user()->role == 1){
        return 'error rusak';
      }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // if(Auth::check() && Auth::user()->role == 1){
      //   return 'error rusak';
      // }

      $paginate = 5;
      $file = File::orderBy('created_at', 'DESC')
          ->paginate($paginate);
      return view('crud.file', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
            'title' => 'required |max:200',
            'kode_barang' => 'required'
          ]);

        if($request->hasFile('filename'))
        {
          $file = $request->file('filename');
          $name = $file->getClientOriginalName();
          $file->move(public_path().'/images/', $name);
        }

        $files = new File();
        $files->title=$request->get('title');
        $files->kode_barang=$request->get('kode_barang');
        $files->harga_barang=$request->get('harga_barang');
        $files->Description=$request->get('Description');
        $files->filename = $name;
        $files->save();

        return redirect('file')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files = File::find($id);
        return view('crud.edit', compact('files','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required |max:200',
        'kode_barang' => 'required'
      ]);

      $file = $request->file('filename');
      $name = $file->getClientOriginalName();
      $file->move(public_path().'/images/', $name);

      $files = File::find($id);
      $files->title=$request->get('title');
      $files->kode_barang=$request->get('kode_barang');
      $files->harga_barang=$request->get('harga_barang');
      $files->Description=$request->get('Description');
      $files->filename = $name;
      $files->save();

      return redirect('file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = File::find($id);

        if ($files != null) {
              $files->delete();
              return redirect('file')->with('error', 'success deleted');
        }else{
              return redirect('file')->with(['message'=> 'Wrong ID!!']);
        }

    }

    public function archive()
    {
        $paginate = 5;
        $files = File::onlyTrashed()->orderBy('deleted_at')->paginate($paginate);
        // dd($files);
        return view('crud.archive', ['file' =>$files]);

    }

     public function restore(Request $r)
     {
       $return = ['status' => 200, 'desc' => 'failed', 'message' => 'You Have not access to restore'];
       if($r->ajax()){
           $id = $r->id;
           $restore = File::onlyTrashed()->where('id',$id);

             if($restore->restore()){
               $return = ['status' => 200, 'desc' => 'ok', 'message' => 'Your Item Has Been Restored', 'id'=>$id];
                 }else{
               $return = ['status' => 200, 'desc' => 'ok', 'message' => 'You Cannot Remove the Item'];
             }
           }
       return $return;
     }

     public function forceDelete(Request $request)
     {
       $return = ['status' => 200, 'desc' => 'failed', 'message' => 'You Have not access to delete'];
       if($request->ajax()){
           $id = $request->id;
           $delete = File::onlyTrashed()->where('id',$id);

             if($delete->forceDelete()){
               $return = ['status' => 200, 'desc' => 'ok', 'message' => 'Your Item Has Been Deleted Permanently', 'id'=>$id];
                 }else{
               $return = ['status' => 200, 'desc' => 'ok', 'message' => 'You Cannot Remove the Item'];
             }
           }
       return $return;
     }

}
