<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <p>Email: {{ Auth::user()->email }}</p>

    <a href="{{ url('/logout') }}">Logout</a>
</body>
</html>
