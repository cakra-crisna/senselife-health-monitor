@extends('layouts.scaffold')

@section('main')

<h1>All Steps</h1>

<p>{{ link_to_route('steps.create', 'Add New Step', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($steps->count())
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
			@foreach ($steps as $step)
				<tr>
					<td>{{{ $step->user }}}</td>
					<td>{{{ $step->timestamp }}}</td>
					<td>{{{ $step->value }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('steps.destroy', $step->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('steps.edit', 'Edit', array($step->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no steps
@endif

@stop
