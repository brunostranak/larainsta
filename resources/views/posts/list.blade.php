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
                           foreach($likes as $like){
                                  
                                }
                           ?>
                          
                           
                           @if(!empty($like))
                            
                                    @foreach($likes as $like)
                           
                                        @if($like->post_id==$post->id)
                                                @if($like->status==1)
                                                        <button style= "height:10px;border:none;background-color: transparent;color:#e2264d;text-decoration: none;font-size: 4em;">
                                                      ❤ 
                                                   </button>
                                                @else

                                                    <button style= "height:10px;border:none;background-color: transparent;color:#a6a5a4;text-decoration: none;font-size: 4em;">
                                                   ❤ 
                                                </button>
                                                @endif
                           
                                        @endif
                           
                                     @endforeach
                         
                          
                       {{$post->likes}}
                      
                       
                       
                            @else
                       
                       <button style= "height:10px;border:none;background-color: transparent;color:#a6a5a4;text-decoration: none;font-size: 4em;">
                          ❤ 
                       </button>
                            @endif
                       </a> 
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

