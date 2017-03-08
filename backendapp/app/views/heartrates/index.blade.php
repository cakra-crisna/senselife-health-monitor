@extends('layouts.scaffold')

@section('main')

<h1>All Heartrates</h1>

<p>{{ link_to_route('heartrates.create', 'Add New Heartrate', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($heartrates->count())
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
			@foreach ($heartrates as $heartrate)
				<tr>
					<td>{{{ $heartrate->user }}}</td>
					<td>{{{ $heartrate->timestamp }}}</td>
					<td>{{{ $heartrate->value }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('heartrates.destroy', $heartrate->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('heartrates.edit', 'Edit', array($heartrate->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no heartrates
@endif

@stop
