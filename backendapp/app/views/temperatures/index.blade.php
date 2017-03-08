@extends('layouts.scaffold')

@section('main')

<h1>All Temperatures</h1>

<p>{{ link_to_route('temperatures.create', 'Add New Temperature', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($temperatures->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Temperature</th>
				<th>Timestamp</th>
				<th>Userid</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($temperatures as $temperature)
				<tr>
					<td>{{{ $temperature->temperature }}}</td>
					<td>{{{ $temperature->timestamp }}}</td>
					<td>{{{ $temperature->userid }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('temperatures.destroy', $temperature->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('temperatures.edit', 'Edit', array($temperature->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no temperatures
@endif

@stop
