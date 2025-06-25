<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<div class="container">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>You are logged in to the dashboard.</p>
    <a href="/logout">Logout</a>
</div>
</body>
</html>
