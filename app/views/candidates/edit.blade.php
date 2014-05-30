@extends('layouts.default')

{{-- Evoting Application--}}
@section('title')
@parent
{{trans('Evoting Application')}}
@stop

{{-- Content --}}
@section('content')

<h1>Edit a candidate</h1>

<!-- if there are creation errors, they will show here -->
<!--{{ HTML::ul($errors->all()) }} -->

{{ Form::model($candidate, array('route' => array('candidates.update', $candidate->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		{{$errors->first('name')}}
	</div>

	<div class="form-group">
		{{ Form::label('manifesto', 'Manifesto') }}
		{{ Form::text('manifesto', Input::old('manifesto'), array('class' => 'form-control')) }}
	    {{$errors->first('manifesto')}}

	</div>
	<div class="form-group">
		{{Form::label('avatar','Upload Image')}}
		{{ Form::file('avatar',Input::old('avatar'),array('class' => 'form-control'))}}
	</div>

	

	{{ Form::submit('Edit the Candidate!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}





@stop