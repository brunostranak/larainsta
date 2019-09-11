@extends('layouts.app')
<?php
use App\User;
?>
@section('content')

<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           @foreach ($posts as $post)

               <div class="card mt-4">
                   
                   
                   <?php
                   $user = User::where('id',$post->user_id)->value('name');
                   ?>
                   <h4>
                   {{$user}}
                   </h4>
                    <div class="card-body">{{$post->description}}</div>
                   <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                  

               </div>   

           @endforeach

       </div>

   </div>

</div>

@endsection
