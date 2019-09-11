<?php

namespace App\Http\Controllers;
use App\Coment;
use Illuminate\Http\Request;

class ComentsController extends Controller
{
    
    public function __construct()

   {

       $this->middleware('auth');

   }
   
   public function create() {

       return view('coments.create');

   }
   
   public function remove(){
       
       
   }
   
   public function store(){

            

       $coment = Coment::create([

           'user_id' => auth()->id(),

           'post_id' => request('post_id'),

           'comentario' => request('comentario')

           

       ])->save();


       return redirect('home');

   }
}
