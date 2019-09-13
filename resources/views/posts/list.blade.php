@extends('layouts.app')
<?php

use App\User;




?>
@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           @foreach ($posts as $post)

               <div class="card mt-4">
                   
                   
                   <?php
                   $user = User::where('id',$post->user_id)->value('name');
                   
                   ?>
                   
                   <div class="container">
                       <h3 style="font-weight:700;">{{$user}}</h3>
                  </div>
                    
                   <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">
                   <br>
                   
                   <div class="container">
                   
                       <!--<a href="/likes/{{Auth::user()->id}}/{{$post->id}}">-->
                       
                       <a style="text-decoration: none;" href="/likes/store/{{Auth::user()->id}}/{{$post->id}}">
                           
                           
                          <?php 
                    if(count($likes)){
                        foreach($likes as $like){                          
                            if($like->user_id==Auth::user()->id && $like->post_id==$post->id){
                                if($like->status==1){
                                    $cor="#e2264d;";
                                    
                                }else{
                                    $cor="#a6a5a4;";
                                    
                                }
                                break;    
                            }else{
                                
                                $cor="#a6a5a4;";
                            }
                        }  
                        
                    }else{
                        $cor="#a6a5a4;";
                    }
                    ?>
                   
                <button style= "cursor:pointer;height:10px;border:none;background-color: transparent;
                        color:{{$cor}};text-decoration: none;font-size: 4em;display: inline;">
                    ❤ 
                </button>
      
                      </a>
                       <h3 style="display: inline">{{$post->likes}} Likes</h3>
                    
                            
                        
                   </div>
                   
                    <br>
                   <div class="container">
                    <h6 style="display:inline;font-weight:700;">{{$user}}</h6>
                   <div style="display:inline;" class="card-body">{{$post->description}}</div>
                   
                   </div>
                   <br>
                   <div class="container" >
                
                     
               @if(isset($coments))
               <ul class="list-group">
                @foreach ($coments as $coment)
                   
                   @if($coment->post_id==$post->id)
                   <?php
                   $user2 = User::where('id',$coment->user_id)->value('name');
                   ?>
                   
                   <li class="list-group-item">
                       
                       <h6 style="display:inline;font-weight:700;">{{$user2}}</h6>
                       
                       <span>{{$coment->comentario}}</span>
                       
                       @if($coment->user_id==Auth::user()->id)
                       <a href="/coments/remove/{{$coment->id}}"> 
                          <img style="width:20px;height:20px;float:right;" src="{{ asset('images/x.png') }}">
                       </a>
                       @endif
                       
                       
                   
                   </li>
                        
                   
                   
                   @endif
                @endforeach
                </ul>

                @endif
                <br>
                    <form method="POST" action="/fazerComentario/{{$post->id}}">
                         @csrf
                         
                         <div class="blocoIcones">
                            
                             <input  id="campo" class="form-control" placeholder="Comente algo..." type="text" name="comentario">
                             <button><img style="width:20px;height:20px;" src="{{ asset('images/send.png') }}"></button>
                          <!-- <input  type="image" style="width:20px;height:20px;float:right;" src="{{ asset('images/send.png') }}">
                           -->
                            
                         </div>   
                         </div>
                   </form>
                <br>
               </div>   

           @endforeach

       </div>

   </div>

</div>

@endsection

