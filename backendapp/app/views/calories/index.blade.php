@extends('layouts.scaffold')

@section('main')

<h1>All Calories</h1>

<p>{{ link_to_route('calories.create', 'Add New Calory', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($calories->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>User</th>
				<th>Timestamp</th>
				<th>Value</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($calories as $calorie)
				<tr>
					<td>{{{ $calorie->user }}}</td>
					<td>{{{ $calorie->timestamp }}}</td>
					<td>{{{ $calorie->value }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('calories.destroy', $calorie->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('calories.edit', 'Edit', array($calorie->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no calories
@endif

@stop
