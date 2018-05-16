@extends('layouts.app')

@section('content')


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
		  <div class="card-footer">{{Auth::user()->name}}</div>
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
