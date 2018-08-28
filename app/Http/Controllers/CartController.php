<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\User;
use App\cart;
use App\Wishlist;
use Auth;
use DB;

class CartController extends Controller
{
    public function buy(Request $request)
    {
      if(!Auth::user()){
          $return = ['status'=> 200, 'url'=> url('/login')];
      }else{
          $return = ['status'=> 200, 'desc'=> 'Error Occurs'];
        if($request->ajax()){
          $barang = new cart;
          $barang->user_id = Auth::user()->id;
          $barang->remember_token = Auth::user()->remember_token;
          $barang->harga_barang = $request->harga_barang;
          $barang->jumlah_barang = $request->jumlah;
          $barang->total_harga = $request->harga_barang * $request->jumlah;
          $barang->file_id = $request->fileId;
          if($barang->save()){
            if ($request->name == "buy"){
              $return = ['status'=>200, 'cartUrl' => route('catalog.shopcart.get')];
            }else{
              $return = ['status'=>200, 'desc' => 'We have added into your Shopcart, Thankyou'];
            }
          }

        }

      }
        return $return;
    }

    public function buyPage()
    {
      $belanja = [];
        if(Auth::user()){
          $id = Auth::user()->id;
          $belanja = cart::where('user_id', $id)->get();
          $totals = cart::where('user_id', $id)->sum('total_harga');
          // dd($totals);
        }
        return view('catalog.shopcart', ['carts'=>$belanja, 'total'=>$totals]);
    }

    public function delete(Request $r)
    {
      $return = ['status' => 200, 'desc' => 'failed', 'message' => 'You Have not access to delete'];
      if($r->ajax()){
          $id = $r->id;
          $delete = cart::find($id);
          if($delete != null){
            if($delete->delete()){
              $totals = cart::where('user_id', Auth::user()->id)->sum('harga_barang');
              $return = ['status' => 200, 'desc' => 'ok', 'message' => 'Your Item Has Been Removed', 'id'=>$id,'total' => 'Rp.'.number_format($totals,0,",",".")];
            }
          }
      }
      return $return;
    }

    public function wishlistPage()
    {
      $belanja = [];
        if(Auth::user()){
          $id = Auth::user()->id;
          $belanja = Wishlist::where('user_id', $id)->get();
          $totals = Wishlist::where('user_id', $id)->sum('total_harga');
          // dd($totals);
        }
        return view('catalog.wishlist', ['carts'=>$belanja, 'total'=>$totals]);
    }

    public function wishlist(Request $request)
    {

        if(!Auth::user()){
            $return = ['status'=> 200, 'url'=> url('/login')];
        }else{
            $return = ['status'=> 200, 'desc'=> 'Error Occurs'];
          if($request->ajax()){
            $barang = new Wishlist;
            $barang->user_id = Auth::user()->id;
            $barang->remember_token = Auth::user()->remember_token;
            $barang->harga_barang = $request->harga_barang;
            $barang->jumlah_barang = $request->jumlah;
            $barang->total_harga = $request->harga_barang * $request->jumlah;
            $barang->file_id = $request->fileId;
            if($barang->save()){
                $return = ['status'=>200, 'desc' => 'We have added into your wishlist, Thankyou'];
            }

          }

        }
          return $return;
    }

    public function wishlistDelete(Request $r)
    {
      $return = ['status' => 200, 'desc' => 'failed', 'message' => 'You Have not access to delete'];
      if($r->ajax()){
          $id = $r->fileId;
          $delete = Wishlist::where($id);
          if($delete != null){
            if($delete->delete()){
              $totals = Wishlist::where('user_id', Auth::user()->id)->sum('harga_barang');
              $return = ['status' => 200, 'desc' => 'ok', 'message' => 'Your Item Has Been Removed', 'id'=>$id,'total' => 'Rp.'.number_format($totals,0,",",".")];
            }
          }
      }
      return $return;
    }
}
