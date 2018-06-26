<html>
<head></head>
<body>
<div>Name: {{ $request['firstName'] . ' ' . $request['lastName'] }}</div>
<div>Email: {{ $request['email'] }}</div>
<div>Phone: {{ $request['phone'] }}</div>
<div>Message: {{ $request['message'] }}</div>
</body>
</html>
