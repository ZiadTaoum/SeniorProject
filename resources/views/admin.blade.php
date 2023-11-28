<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth

        <p>you are not an admin</p>

        @else

        <div style="border: 10px solid black;">
            <h2>Admin Login</h2>
            <form action="/AdminLogin" method="POST">
                @csrf
                <input type="text" name="adminLoginName" placeholder="name">
                <input type="email" name="adminLoginEmail" placeholder="email">
                <input type="password" name="adminLoginPassword" placeholder="password">
                <button>Log in</button>
            </form>
            </div>

        @endauth

</body>
</html>