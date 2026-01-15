<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
</head>

<body>

    <h1>Welcome, {{ auth()->user()->name }}</h1>

    <p>You are logged in successfully.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>

</html>
