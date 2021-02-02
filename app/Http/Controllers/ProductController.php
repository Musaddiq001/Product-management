<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Http\Requests\adminRequest;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductController extends Controller
{
	public function list(){

		$products = product::all();
		return view('product',['product'=>$products]);
	}

	public function new(){

		return view('new');
	}

	public function insert(Request $req){
		$product 			= new Product;
		$product->productName = $req->name;
		$product->expdate 	= $req->exp;
		$product->price 	= $req->price;

		if($product->save()){
			return redirect()->route('product');
		}else{
			return redirect()->route('/');
		}	
	}

	public function delete($id){
		$products = Product::find($id);
		return view('delete', $products);
	}

	public function destroy($id, Request $req){
		if(Product::destroy($req->productId)){
			return redirect()->route('product');
		}else{
			return redirect()->route('delete', $id);
		}
	}

	public function edit($id){

		$products = Product::find($id);
		return view('edit', $products);
	}

	public function update($id, Request $req){
		
		$product 			= Product::find($id);
		$product->productName = $req->name;
		$product->expdate 	= $req->exp;
		$product->price 	= $req->price;

		if($product->save()){
			return redirect()->route('product');
		}else{
			return redirect()->route('edit', $id);
		}
	}
	
}
