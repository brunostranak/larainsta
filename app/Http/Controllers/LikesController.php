<?php

namespace App\Http\Controllers;
use App\Like;
use App\Post;
use DB;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct()

   {

       $this->middleware('auth');

   }

 
   public function store($user_id,$post_id){
      
       
       $likes = Like::where('user_id',$user_id)->where('post_id',$post_id)->get();
       
       
       
       
       if(count($likes)){
           
           foreach($likes as $like){
               if($like->status==1){
                   Post::find($post_id)->decrement('likes',1);
                   DB::update('UPDATE `likes` SET status = 0 WHERE id ='.$like->id);
               }else{
                   Post::find($post_id)->increment('likes',1);
                   DB::update('UPDATE `likes` SET status = 1 WHERE id ='.$like->id);
               }
               
           }
           
       }else{
           
           Post::find($post_id)->increment('likes',1);
           Like::create([

           'user_id' => $user_id,

           'post_id' => $post_id,
            
            'status' => 1
                   
                   
            ])->save();
       }
       
       return redirect("posts"); 
    }
       
      
   
   

}
