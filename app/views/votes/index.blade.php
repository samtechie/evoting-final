@extends('layouts.default')

{{-- Evoting Application--}}
@section('title')
@parent
{{trans('Evoting Application')}}
@stop

{{-- Content --}}
@section('content')
@if (Session::has('message'))
	<div class="alert alert-info alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('message') }}
	</div>
@endif
<h1> Cast your vote for your favorite candidate</h1>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Photo</td>
			<td>Name</td>
			<td>Manifesto</td>
			<td>Vote</td>
		</tr>
	</thead>
	<tbody>
	@foreach($candidates as $key => $value)
		<tr>
			<td><img src="{{$value->avatar->url('thumb')}}"    alt="..."></td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->manifesto }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>
              <label class="radio">
                 <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
               </label>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<div class="pull-right">
<a class="btn btn-small btn-success" href="{{ URL::route('home') }}">Submit your vote</a>
</div>



@stop