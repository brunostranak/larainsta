<?php

namespace App\Http\Controllers;
use App\Like;
use Illuminate\Http\Request;
session_start();
class LikesController extends Controller
{
    public function __construct()

   {

       $this->middleware('auth');

   }


   public function index($user_id,$post_id,$status){
       
        $likes = Like::where('user_id','$user_id')->where('post_id','$post_id')->get();
        
       
       if(!empty($likes["items:protected"])){
          $status="on";
       }else{
          $status="off";
          
          Like::create([

           'user_id' => $user_id,

           'post_id' => $post_id

          

       ])->save();
       }
       unset($_SESSION["likes"]);
       $_SESSION["likes"]=$status;

       return redirect("posts");
   }

}
