@extends('layouts.scaffold')

@section('main')

<h1>Show Heartrate</h1>

<p>{{ link_to_route('heartrates.index', 'Return to All heartrates', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>User</th>
				<th>Timestamp</th>
				<th>Value</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
