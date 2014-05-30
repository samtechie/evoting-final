@extends('layouts.default')

{{-- Evoting Application--}}
@section('title')
@parent
{{trans('Evoting Application')}}
@stop

{{-- Content --}}
@section('content')


	<div class="jumbotron ">
		<div class="row">
		  <div class="col-md-4">
		  	<div class="caption">
                <h3>{{ $candidate->name }}</h3>
               </div>
		  	<div class="thumbnail">
              <img src="{{$candidate->avatar->url('medium')}}"    alt="...">
              	
            </div>
		  	
		  </div>
		  <div class="col-md-8">
		  	<p>{{ $candidate->manifesto}}</p>
		  </div>

		
		
	  </div>
	</div>
@stop