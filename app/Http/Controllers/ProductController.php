<?php

namespace App\Http\Controllers;

use DB;
//use App\Quotation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(){
        
        $result = DB::table('products')->paginate(5);
        return view('product.index')->with('data',$result);
    }
    
    public function form(){
        return view('product.form');
    }
    
     public function delete($id){
        $i = DB::table('products')->where('id', '=', $id)->delete();
         if($i > 0){
                 \Session::flash('message','Record deleted successfully');
                 return redirect('productindex');
             }
    }
    
    
    public function save(Request $request){
        $post = $request->all();
        var_dump($post);
        
        $v = \Validator::make($request->all(),
                [
                   'product_name'   =>  'required',
                   'product_price'  =>  'required',
                   'product_qty'    =>  'required',
                ]);
        
        if($v -> fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
         else {
             $data = array (
                  'product_name'   =>  $post['product_name'],
                  'product_price'  =>  $post['product_price'],
                  'product_qty'    =>  $post['product_qty'],
             );
             
             $i = DB::table('products')->insert($data);
             
             if($i > 0){
                 \Session::flash('message','Record added successfully');
                 return redirect('productindex');
             }
         }
                
    }
    
    public function update(Request $request){
        $post = $request->all();
        var_dump($post);
        
        $v = \Validator::make($request->all(),
                [
                   'product_name'   =>  'required',
                   'product_price'  =>  'required',
                   'product_qty'    =>  'required',
                ]);
        
        if($v -> fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
         else {
             $data = array (
                  'product_name'   =>  $post['product_name'],
                  'product_price'  =>  $post['product_price'],
                  'product_qty'    =>  $post['product_qty'],
             );
             
             $i = DB::table('products')->insert($data);
             
             if($i > 0){
                 \Session::flash('message','Record added successfully');
                 return redirect('productindex');
             }
         }
                
    }
   
}

