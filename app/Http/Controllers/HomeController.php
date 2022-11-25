<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\contracts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function home() {
    return view('home');
    }


  public function contracts() {
    return view('radio');
     }


  public function equipments() {
    return view('social');
}


 public function breakdown() {
    return view('breakdown');
}



  public function about() {
    return view('about');
}


 public function contract(Request $request) {

          $user_name=$request->user_name;
          $email=$request->email;
          $eqp_details=$request->eqp_details;
          $user_id=Auth::id();

          $expire = strtotime("+7 day");
          $expire =date('Y-m-d', $expire);
          $contract_id = uniqid();

          //$date1 = "1998-11-24";$date2 = "1997-03-26";s
          //if ($date1 > $date2)
          

          //   //SINGLE IMG
          // if($hos->image!=''){
          // $image=$hos->file('image');
          // $uniqid=hexdec(uniqid());
          // $ext=strtolower($image->getClientOriginalExtension());
          // $create_name=$uniqid.'.'.$ext; 
          // $loc='assets_admin/img/locations';
          // $image->move($loc, $create_name);
          // //DB::table('products')->where('Id',$id)->update($datas);

          $contracts = contracts::create([
          'user_name' =>  $user_name,
          'email' =>  $email,
          'eqp_details' =>  $eqp_details,
          'user_id' =>  $user_id,
          'expire' =>  $expire,
          'contract_id' =>  $contract_id
         
          ]);

          return back()->with('success', 'Contract created!, contract id is = '.$contract_id);
    }

      

//END CLASS
}
