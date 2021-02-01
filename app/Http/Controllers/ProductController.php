<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\manager;
use App\customer;
use App\houseProvider;
use App\houseinfo;
use App\rented;
use App\Http\Requests\adminRequest;
use Illuminate\Support\Facades\DB;
use Validator;

class adminController extends Controller
{

	public function index(Request $req){

		if($req->session()->has('uname')){
			return view('admin.index');
		}else{
			return redirect('/login');
		}
	}   

	public function show($id){

		$user = User::find($id);
		return view('admin.details', $user);
	}
	
	public function add(){

		return view('admin.add');
	}


	public function insert(Request $req){
		
		$req->validate([
			'fname'=>'bail|required|min:5|unique:managers',
			'lname'=>'required',
			'uname'=>'required',
			'password'=>'required|min:4',
			'email'=>'required|email',
			'phone'=>'required',
			'type'=>'required',
			'address'=>'required',
			'nid'=>'required',
			'division'=>'required',
     		'area'=>'required'
		]);

		$user 			= new manager;
		$user->fname = $req->fname;
		$user->lname 	= $req->lname;
		$user->username 	= $req->uname;
		$user->password 	= $req->password ;
        $user->email 	= $req->email;
		$user->phone 	= $req->phone;
		$user->type 	= $req->type;
		$user->address 	= $req->address;
		$user->nid 	= $req->nid ;
        $user->division 	= $req->division;
		$user->area 	= $req->area;

		if($user->save()){
			return redirect()->route('admin.index');
		}else{
			return redirect()->route('add.index');
		}

		
	}
    public function edit(Request $request)
    {
        $user = DB::table('admininfo')->where('username', $request->session()->get('uname'))->first();
            return view('admin.edit', ['user'=>$user]);
    }

	public function assign($id){
	
		$user = manager::find($id);
		return view('admin.assign', $user);
	}
	public function assigned ($id, Request $req){
		
		$user = manager::find($id);
		$user->division = $req->division;
		$user->area = $req->area;


		if($user->save()){
			return redirect()->route('admin.list');
		}else{
			return redirect()->route('admin.assign', $username);
		}
	}
	
		
	public function edit1($id){

		$user = Buscounters::find($id);
		return view('admin.edit1', $user);
	}
	



	public function update( Request $request){

 $request->validate([
			'uname'=>'required',
			'email'=>'email',
			'password'=>'required|min:4',
			
		]);

  $affected= DB::table('admininfo')
              ->where('username', $request->username)
              ->update(array('fname' => $request->fname,
                       'lname' => $request->lname, 
                       'password' => $request->password,
                       'email' => $request->email,      
                       'phone' => $request->phone,
                       'address' => $request->address,
                       'nid' => $request->nid,
					   'password'=> $request->password));
            return redirect()->route('admin.index');  


			

    }
	

	
	public function update1($id, Request $req){
		
		$user = Buscounters::find($id);
		$user->operator = $req->operator;
		$user->manager = $req->manager;
		$user->name = $req->name;
		$user->location 	= $req->location;

		if($user->save()){
			return redirect()->route('admin.list2');
		}else{
			return redirect()->route('admin.edit1', $id);
		}
	}

	public function delete($id){
		$user = manager::find($id);
		return view('admin.delete', $user);
	}
	
	public function details($id){
		$user = houseinfo::find($id);
		return view('admin.details', $user);
	}

    public function delete1($id){
		$user = customer::find($id);
		return view('admin.delete1', $user);
	}

    public function delete2($id){
		$user = houseProvider::find($id);
		return view('admin.delete2', $user);
	}	
	

	public function destroy($id, Request $req){
		if(manager::destroy($req->userId)){
			return redirect()->route('admin.list');
		}else{
			return redirect()->route('admin.delete', $id);
		}
	}
	
	public function destroy1($id, Request $req){
		if(customer::destroy($req->userId)){
			return redirect()->route('admin.list1');
		}else{
			return redirect()->route('admin.delete1', $id);
		}
	}
	public function destroy2($id, Request $req){
		if(houseProvider::destroy($req->userId)){
			return redirect()->route('admin.list2');
		}else{
			return redirect()->route('admin.delete2', $id);
		}
	}

	public function list(){

		$users = manager::all();
		return view('admin.view_managers', ['managers'=>$users]);
	}
	
	public function list1(){	
		$users = customer::all();	
	
		return view('admin.view_customers', ['customers'=>$users]);
	}
	
	public function list2(){
		
		$users = houseProvider::all();
							
		return view('admin.view_houseowners', ['houseowners'=>$users]);
	}
	public function list3(){
		$users = houseinfo::all();
		return view('admin.view_houses', ['houseinfos'=>$users]);
	}
	public function list4(){
		$users = rented::all();
		return view('admin.view_rented', ['rentedhouseinfo'=>$users]);
	}
	
	public function searchManager(Request $request)
	{	
        $managers = DB::table('managers');
        if( $request->input('search')){
            $managers = manager::where('username', 'LIKE', $request->search . "%")
			->get();
        }
        
    	return view('admin.view_managers', compact('managers'));
    }
	
	public function searchCustomer(Request $request)
	{	
        $customers = DB::table('customer');
        if( $request->input('search')){
            $customers = customer::where('username', 'LIKE', $request->search . "%")
			->get();
        }
        
    	return view('admin.view_customers', compact('customers'));
    }
	
	
	public function searchHouseowner(Request $request)
	{	
        $houseowners = DB::table('houseowners');
        if( $request->input('search')){
            $houseowners = houseProvider::where('username', 'LIKE', $request->search . "%")
			->get();
        }
        
    	return view('admin.view_houseowners', compact('houseowners'));
    }
	
	public function searchHouses(Request $request)
	{	
        $houseinfos = DB::table('houseinfos');
        if( $request->input('search')){
            $houseinfos = houseinfo::where('area', 'LIKE', $request->search . "%")
			->get();
        }
        
    	return view('admin.view_houses', compact('houseinfos'));
    }
	
	public function searchRented(Request $request)
	{	
        $rentedhouseinfo = DB::table('rentedhouseinfo');
        if( $request->input('search')){
            $rentedhouseinfo = rented::where('area', 'LIKE', $request->search . "%")
			->get();
        }
        
    	return view('admin.view_rented', compact('rentedhouseinfo'));
    }

}
