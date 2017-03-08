@extends('layouts.scaffold')

@section('main')

<h1>Show Calory</h1>

<p>{{ link_to_route('calories.index', 'Return to All calories', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

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
	</tbody>
</table>

@stop
