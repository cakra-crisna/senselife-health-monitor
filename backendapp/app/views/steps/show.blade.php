@extends('layouts.scaffold')

@section('main')

<h1>Show Step</h1>

<p>{{ link_to_route('steps.index', 'Return to All steps', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

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
	</tbody>
</table>

@stop
