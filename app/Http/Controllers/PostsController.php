<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Coment;
use App\Like;

class PostsController extends Controller

{


   public function __construct()

   {

       $this->middleware('auth');

   }


   public function index(){
       $coments = Coment::all();
       $posts = Post::orderby('id','DESC')->get();
       $likes = Like::all();
       
       return view('posts.list')->with('coments', $coments)->with('posts',$posts)->with('likes',$likes);

   }


   public function create() {

       return view('posts.create');

   }


   public function store(){

       request()->validate([

           'image_path' => ['required', 'image']          

       ]);      

       $post = Post::create([

           'user_id' => auth()->id(),

           'image_path' => request()->file('image_path')->store('posts', 'public'),

           'description' => request('description'), 

           'filter' => request('filter'),

           'likes' => 0

       ])->save();


       return redirect('home');

   }

}


    
    //

