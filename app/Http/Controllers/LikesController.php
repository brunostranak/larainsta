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
       #$qtdlike= Like::where('post_id',$post_id)->get()->count();
       
       
       
       #$like = Like::all();
          
       foreach($likes as $like){
           
          
           print_r($like);
       }
       
       #print_r($likes);
       if(isset($like)){
               
          if($like->status==0){
           
           #$seila=\DB::update('UPDATE `posts` SET likes = 2 WHERE id = $post_id');
          Post::find($post_id)->increment('likes',1);
          
          
          DB::update('UPDATE `likes` SET status = 1 WHERE id ='.$like->id);     
           
               
          
          
       }else{
          
          
          DB::update('UPDATE `likes` SET status = 0 WHERE id ='.$like->id);     
          #DB::delete('delete from likes where id ='.$like->id);
           
          Post::find($post_id)->decrement('likes',1);
          
          
          
          
       }
       
       }else{
           
           
           Like::create([

           'user_id' => $user_id,

           'post_id' => $post_id


       ])->save();
       }
      
    
       
      return redirect("posts"); 
       
   }
   
   

}
