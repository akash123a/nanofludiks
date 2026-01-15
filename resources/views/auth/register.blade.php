<!DOCTYPE html>
<html>

<head>
    <title>User Register</title>
</head>

<body>

    <h2>User Registration</h2>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="name" placeholder="Name" required><br><br>

        <input type="email" name="email" placeholder="Email" required><br><br>

        <input type="password" name="password" placeholder="Password" required><br><br>

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br><br>

        <button type="submit">Register</button>
    </form>

    <a href="/login">Already have an account? Login</a>

</body>

</html>
