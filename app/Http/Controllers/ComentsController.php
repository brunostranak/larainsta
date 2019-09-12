<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coment;
use App\Post;
use DB;
class ComentsController extends Controller
{
    
    public function __construct()

   {

       $this->middleware('auth');

   }
   
   public function index(){
       
       return redirect('posts');
   }
   
   public function create() {

       return view('coments.create');

   }
   
   public function remove($id){
       DB::delete('delete from coments where id ='.$id);
       return redirect('coments');
       
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
