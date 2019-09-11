<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coment;
use App\Post;
class ComentsController extends Controller
{
    
    public function __construct()

   {

       $this->middleware('auth');

   }
   
   public function index(){
       
       $coments = Coment::all();
       $posts = Post::orderby('id','DESC')->get();
       return view('posts.list')->with('coments', $coments)->with('posts',$posts);
   }
   
   public function create() {

       return view('coments.create');

   }
   
   public function remove(){
       
       
   }
   
   public function store($id){

            
       
       $coment = Coment::create([

           'user_id' => auth()->id(),

           'post_id' => $id,

           'comentario' => request('comentario')

           

       ])->save();

       
       return redirect('coments');

   }
}
