<!DOCTYPE html>
<html ng-app ="app">
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/angular.js"></script>
<script type="text/javascript" src="js/angular-route.js"></script>

<script type="text/javascript" src="js/impact.js"></script>
</head>

<body>
<div class="container">
	<div>
		<div>
			<h1>Welcome to Angular</h1>
			<div id="view"  ng-view> </div>
		</div>
	</div>
</div>
</body>
</html>
