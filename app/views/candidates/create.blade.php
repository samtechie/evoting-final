@extends('layouts.default')

{{-- Evoting Application--}}
@section('title')
@parent
{{trans('Evoting Application')}}
@stop

{{-- Content --}}
@section('content')

<h1>Add a candidate</h1>

<!-- if there are creation errors, they will show here -->
<!--{{ HTML::ul($errors->all()) }} -->

{{ Form::open(array('url' => 'candidates')) }}

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

	

	{{ Form::submit('Add the Candidate!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}





@stop