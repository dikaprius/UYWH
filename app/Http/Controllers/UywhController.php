<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

class UywhController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function show()
    {
      $paginate = 9;
      $barang = File::orderBy('created_at', 'DESC')->paginate($paginate);
      return view('Category.catalog', ['files' => $barang]);
    }

    public function checkout($id)
    {
      $barang = File::findOrFail($id);

      if($barang==null){
        return view('Errors.404');
      }else{
        return view('catalog.checkout', ['barang'=>$barang, 'id'=>$id]);
      }

    }

    public function searchData(Request $request)
    {
      //return "search";
      $paginate=6;
      if($request->has('search')){
    		$file = File::search($request->get('search'))->orderBy('search')->paginate($paginate);
    	}else{
        $file = File::search($request->get('search'))->orderBy('search')->paginate($paginate);
      }
        return view('search', ['files'=>$file]);
    }

    public function filter($nama_barang)
    {
      $paginate =9;
      $barang2 = File::where('kode_barang','=', $nama_barang)->orderBy('created_at','DECS')
                  ->paginate($paginate);
      return view ('Category.index', ['barangs'=>$barang2]);
    }

}
