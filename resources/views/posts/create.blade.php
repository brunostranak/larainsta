@extends('layouts.app')


@section('content')

<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           <h1 style="text-align:center">Novo POST</h1>

           <form method="POST" enctype="multipart/form-data" action="/posts">

         

               @csrf

               <textarea placeholder="Descrição"class='form-control' type="text" name="description"></textarea>
               <br>
         

               <input placeholder="Filtro" class='form-control' type="text" name="filter">
               <br>
         
               <label for="arquivo"><img style="width:50px;height:50px;" src="{{ asset('images/upload.png') }}"></label>
               
               <input hidden placeholder="Arquivo" id="arquivo" class='form-control' type="file" name="image_path">
              
         
               <br>
               
               <button class='form-control' type="submit">vai</button>

           </form>

       </div>

   </div>

</div>

@endsection
