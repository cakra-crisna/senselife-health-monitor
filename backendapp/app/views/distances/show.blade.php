@extends('layouts.scaffold')

@section('main')

<h1>Show Distance</h1>

<p>{{ link_to_route('distances.index', 'Return to All distances', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Distance</th>
				<th>Timestamp</th>
				<th>Userid</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $distance->distance }}}</td>
					<td>{{{ $distance->timestamp }}}</td>
					<td>{{{ $distance->userid }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('distances.destroy', $distance->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('distances.edit', 'Edit', array($distance->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
