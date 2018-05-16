@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-sm-3">
		<div class="thumbnail">
      <!-- <a href="/w3images/lights.jpg"> -->
      <!--  <img src="pro.jpg" alt="Lights" style="width:50%"> 
        <div class="caption">
          <p>USER</p>
        </div> -->
      <!-- </a> -->
    </div>
	</div>
	<div class="col-sm-6">
		
		<form action="/addPost" method="post" enctype="multipart/form-data">                    		 {{ csrf_field() }} 
		  <div class="form-group">
		    <!-- <label for="formGroupExampleInput">Heading</label> -->
		    <input type="text" class="form-control" id="title" name="title" placeholder="Type the title of your posts...">
		  </div>
		  <div class="form-group">
		    <!-- <label for="formGroupExampleInput2">Another label</label> -->
		    <textarea class="form-control" id="content" name="content" placeholder="What's on your mind?"></textarea>
		  </div>
		  <input name="media" id="media" type="file">						
		  <input type="submit" name="Submit" value="Post">
		</form>

	</div>
	<div class="col-sm-3">
		
	</div>
</div>
<div class="row" style="margin-top: 10%">
	<div class="col-sm-1">
		
	</div>


	

 @foreach($appoint as $value)
	<div class="col-sm-10">
		<div class="card">
		<div class="row">
		
		<div class="col-sm-4"><div style="margin-top: 10%" class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="{{$value->image_location}}" allowfullscreen></iframe>
</div> 
 </div> 
		<div class="col-sm-8">
		  <div class="card-header"><div class="row"><div class="col-sm-4"><h3 style="float: left">{{$value->title}}</h3></div><div class="col-sm-4"></div><div class="col-sm-4"> <p style="float: right">{{$value->date}}</p></div></div></div>
		  <div class="card-body">{{$value->content}}</div>
		  
		  <div class="card-footer">{{ $value->name }}</div>
		  </div>
		  
		</div>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>
<div class="row">
	<div class="col-sm-1">		
	</div>


 @endforeach

@stop
