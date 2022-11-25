<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\admins;
use App\Models\User;
use App\Models\agencies;
use App\Models\contracts;
use App\Models\equipments;
use Mail;
use Session;
use DB; 

class AdminController extends Controller
{

     public function logout()
    {  
        return redirect('admin/login'); 
    }

     public function index_admin()
    {          
        
        $admin= admins::where('id',1)->get();
        return view('admin.index_admin', compact( 'admin')); 
    }





//EQPMENTS

 public function delete_eqp($id)
    {           
       $deleted = equipments::where('id', $id)->delete();
       return back()->with('success', "Brand Added!"); 
 }

 public function create_eqps()
    { 

   return view('admin.job_add'); 
    }

 

public function create_eqp(Request $hos)
    {     
          $title =$hos->title;
          $desc=$hos->desc;
          $location_id=$hos->location_id;
          $hours_required=$hos->hours_required;
          $status=$hos->status;
          $max_hires=$hos->max_hires;
          $rate=$hos->rate; 
           $item = $hos->items;

           $items='';
           foreach($item as $i)
            $items = $items.','.$i;


            //SINGLE IMG
          //if($hos->image!=''){
          $image=$hos->file('image');
          $uniqid=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext; 
          $loc='assets_admin/img/doctors';
          $image->move($loc, $create_name);
          //DB::table('products')->where('Id',$id)->update($datas);

          // $location = jobs::create([
          // 'title' =>  $title,
          // 'desc' =>  $desc,
          // 'location_id' =>  $location_id,
          // 'hours_required' =>  $hours_required,
          // 'status' =>  $status,
          // 'max_hires' =>  $max_hires,
          // 'rate' =>  $rate,
          // 'items' =>  $items,
          // 'image' =>  env('APP_URL').$loc.'/'.$create_name
          
          // ]);
          // return redirect('admin/eqp-list'); 
    // }

    //   $location = jobs::create([
    //       'title' =>  $title,
    //       'desc' =>  $desc,
    //       'location_id' =>  $location_id,
    //       'hours_required' =>  $hours_required,
    //       'status' =>  $status,
    //       'max_hires' =>  $max_hires,
    //       'rate' =>  $rate,
    //       'items' =>  $items                  
    //       ]);
    //   return back()->with('success', "Job Added!");  
    }

public function eqps()
    {       
        $equipments= equipments::get(); 
        $agencies= agencies::get();

         return view('admin.eqps', compact('equipments','agencies'));       
    }



public function eqp_edit($id)
    {       
         $equipments= equipments::where('id',$id)->get(); 
         return view('admin.job_edit', compact('equipments'));       
    }


public function update_eqp(Request $hos)
    {           
        $id=$hos->id;
        $id_asn=$hos->id_asn;
        //$seller_id=$hos->seller_id;
        $newData =array();
        $newData['status2'] = $hos->status;

           $item = $hos->items;
           $items='';
           foreach($item as $i)
            $items = $items.','.$i;

      // jobs::where('id',$id)->update($hos->except(['_token']));
       //DB::table('assigned')->where('id_asn',$id_asn)->update($newData);

       if($hos->status =='Completed'){
        $completed=array();
        $completed['current_job_id']=0;

        //$currJob=DB::table('assigned')->where('id_asn',$id_asn)->first();
        $seller_id=$currJob->seller_id;

        //$currSeller = DB::table('sellers')->where('id',$seller_id)->first();
        if($currSeller->jobs_completed_ids==0) $com_ids='';
        else $com_ids=$currSeller->jobs_completed_ids;
        $completed['jobs_completed_ids']=$com_ids.$id.',';
        //DB::table('sellers')->where('id',$seller_id)->update($completed);
       }

       //  //SINGLE IMG
       //    if($hos->image!=''){
       //    $image=$hos->file('image');
       //    $uniqid=hexdec(uniqid());
       //    $ext=strtolower($image->getClientOriginalExtension());
       //    $create_name=$uniqid.'.'.$ext; 
       //    $loc='assets_admin/img/doctors';
       //    $image->move($loc, $create_name);

       //  $datas['image']=$create_name;
       // DB::table('jobs')->where('id',$id)->update($datas);
       // return redirect('admin/jobs-list'); 
 //}
 return redirect('admin/eqps'); 
 }



    //EQPMENTS




 

  //CONTRACTS

public function delete_contracts($id)
    {           
       $deleted = contracts::where('id', $id)->delete();
       return back()->with('success', "Brand Added!"); 
 }


 public function contracts()
    {           
        $contracts= contracts::get();
        $equipments = equipments::get();
       return view('admin.contracts', compact('contracts','equipments')); 
 }


 public function contracts_edit($id,$id_asn)
    {       
        $contracts= contracts::where('id',$id)->get();
        $equipments = equipments::get();

  return view('admin.contract_edit', compact('contracts','equipments'));       
    }

    public function update_contracts(Request $hos)
    {           
        $id=$hos->id;
        $id_asn=$hos->id_asn;
        //$seller_id=$hos->seller_id;
        $newData =array();
        $newData['status2'] = $hos->status;

           $item = $hos->items;
           $items='';
           foreach($item as $i)
            $items = $items.','.$i;

      // contracts::where('id',$id)->update($hos->except(['_token']));
       //DB::table('assigned')->where('id_asn',$id_asn)->update($newData);

       if($hos->status =='Completed'){
        $completed=array();
        $completed['current_job_id']=0;

        //$currJob=DB::table('assigned')->where('id_asn',$id_asn)->first();
        $seller_id=$currJob->seller_id;

        //$currSeller = DB::table('contracts')->where('id',$seller_id)->first();
        if($currSeller->jobs_completed_ids==0) $com_ids='';
        else $com_ids=$currSeller->jobs_completed_ids;
        $completed['jobs_completed_ids']=$com_ids.$id.',';
        //DB::table('contracts')->where('id',$seller_id)->update($completed);
       }

       //  //SINGLE IMG
       //    if($hos->image!=''){
       //    $image=$hos->file('image');
       //    $uniqid=hexdec(uniqid());
       //    $ext=strtolower($image->getClientOriginalExtension());
       //    $create_name=$uniqid.'.'.$ext; 
       //    $loc='assets_admin/img/doctors';
       //    $image->move($loc, $create_name);

       //  $datas['image']=$create_name;
       // DB::table('contracts')->where('id',$id)->update($datas);
       // return redirect('admin/jobs-list'); 
 //}
 return redirect('admin/contracts'); 
 }

   //CONTRACTS


 //Agencies

 public function delete_agencies($id)
    {           
       $deleted = agencies::where('id', $id)->delete();
       return back()->with('success', "Brand Added!"); 
 }

 public function agencies()
    {           
        $agencies= agencies::get();
       return view('admin.agencies', compact('agencies')); 

 }


  public function agencies_edit($id,$id_asn)
    {       
        $agencies= agencies::where('id',$id)->get();
        $equipments = equipments::get();

        return view('admin.agency_edit', compact('equipments','agencies'));       
    }

    public function update_agencies(Request $hos)
    {           
        $id=$hos->id;
        $id_asn=$hos->id_asn;
        //$seller_id=$hos->seller_id;
        $newData =array();
        $newData['status2'] = $hos->status;

           $item = $hos->items;
           $items='';
           foreach($item as $i)
            $items = $items.','.$i;

      // agencies::where('id',$id)->update($hos->except(['_token']));
       //DB::table('assigned')->where('id_asn',$id_asn)->update($newData);

       if($hos->status =='Completed'){
        $completed=array();
        $completed['current_job_id']=0;

        //$currJob=DB::table('assigned')->where('id_asn',$id_asn)->first();
        $seller_id=$currJob->seller_id;

        //$currSeller = DB::table('sellers')->where('id',$seller_id)->first();
        if($currSeller->jobs_completed_ids==0) $com_ids='';
        else $com_ids=$currSeller->jobs_completed_ids;
        $completed['jobs_completed_ids']=$com_ids.$id.',';
        //DB::table('agencies')->where('id',$seller_id)->update($completed);
       }

       //  //SINGLE IMG
       //    if($hos->image!=''){
       //    $image=$hos->file('image');
       //    $uniqid=hexdec(uniqid());
       //    $ext=strtolower($image->getClientOriginalExtension());
       //    $create_name=$uniqid.'.'.$ext; 
       //    $loc='assets_admin/img/doctors';
       //    $image->move($loc, $create_name);

       //  $datas['image']=$create_name;
       // DB::table('agencies')->where('id',$id)->update($datas);
       // return redirect('admin/jobs-list'); 
 //}
 return redirect('admin/agencies'); 
 }




 //Agencies


    //** Login attempt Admin//______________________________________________________________________________

 public function adminLogin(Request $formData)
{       
$email = $formData->email;
$password = $formData->password;
$user= admins::where('email', $email)->get(); 
$check_user=json_decode($user);
//print_r($check_user); echo $check_user[0]->password; exit;

if($user->count() >0 ) {
$db_password=$check_user[0]->password; //opd_admin
if(password_verify($password, $db_password)) { 
    Session::put('admin','Logged!');
    return redirect('admin/index_admin'); }
else{
    echo "Password wrong!";
   

}
    }

       else { echo "user don't exist"; }

}

//** Forgot

public function forgot($remail)
    { 

         return view('admin.forgot_password',compact('remail'));
     
    }


public function send_reset_email(Request $request)
    {

        $remail=$request->email;   
        

        // Send Email

        $info=['Name'=>'Dele', 'email' => $remail];
        $user['to']= $remail;
        Mail::send('admin.mail', $info, function($msg) use ($user){

            $msg->to($user['to']);
            $msg->subject('Test Mail');

        });

        echo "Check your email"; exit;

        // Send Email

    }


public function reset(Request $request, $remail)
    { echo "hello";

       $email=$remail;
       $password_1=$request->password; 
       $password=$request->c_password; 

       if($password_1==$password) {
     $password_1= Hash::make($password_1);
     $update= DB::table('admins')->where('email', $email)
     -> limit(1)->update(['password'=> $password_1]);

     if($update) {Session::put('reset', 'password reset success!');return redirect('admin/login'); }
       }    
          else {
            Session::put('wrong_pwd', 'password do not match! try again');
          return redirect()->back();
      }

    }


//______________________________________________________________________________



    public function adminLogout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('admin/login');
}

    //** Login attempt and Custom Authentication




// Remove special chars
    function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}



      public function get_sugges($sText) {   
      $searchName=$sText; 
      $cat=DB::table('categories')->where('name', 'like', '%'.$searchName.'%')->get();
      $cats=DB::table('categories')->where('name', 'like', '%'.$searchName.'%')->first();

      if($cat->count()>0) $cat_doc_id=$cats->id; else $cat_doc_id=0;

      $result=DB::table('jobs')->where('name', 'like', '%'.$searchName.'%')->
      orWhere('category_id',$cat_doc_id)->get();

         return response()->json([ 'data'=>$result ]);

     }


}