<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Invite to view the Health Chart</h2>

		<div>
			You have been invited by {{ $user }} to view the health chart.
			<br><br>
			Please click on the following link:	
			<br><br>
			<a href="{{ $url }}" target="_blank">{{ $url }}</a>
			<br><br>
			Thank you,<br>
			SenseLife

		</div>
	</body>
</html>
