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
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Manifesto</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($candidates as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->manifesto }}</td>
			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the candidate (uses the destroy method DESTROY /candidates/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'candidates/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('candidates/' . $value->id) }}">Show this Candidate</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('candidates/' . $value->id . '/edit') }}">Edit this Candidate</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>


@stop