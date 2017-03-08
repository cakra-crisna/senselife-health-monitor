@extends('layouts.scaffold')

@section('main')

<h1>All Distances</h1>

<p>{{ link_to_route('distances.create', 'Add New Distance', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($distances->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Distance</th>
				<th>Timestamp</th>
				<th>Userid</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($distances as $distance)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no distances
@endif

@stop
