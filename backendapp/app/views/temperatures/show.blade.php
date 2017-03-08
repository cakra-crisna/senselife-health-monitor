@extends('layouts.scaffold')

@section('main')

<h1>Show Temperature</h1>

<p>{{ link_to_route('temperatures.index', 'Return to All temperatures', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Temperature</th>
				<th>Timestamp</th>
				<th>Userid</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
