<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth
    <p>you are logged in</p>
    <form action="/Logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>

    <div style="border: 10px solid black;">
        <h2>Leave a Review</h2>
        <form action="/create-review" method="POST">
            @csrf
            
            <textarea name="ReviewContent" placeholder="enter your review"></textarea>
            <button>save review</button>
        </form>
    </div>

    <div style="border: 10px solid black;">
        <h2>All Posts</h2>
        @foreach ($reviews as $review)
            <div style="background-color: grey; padding:10px; margin:10px;">
                <h3>{{$review['ReviewContent']}}</h3>
                <p><a href="/edit-review/{{$review->id}}">Edit</a></p>
                <form action="/delete-review/{{$review->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    @else

    <div style="border: 10px solid black;">
        <h2>Register</h2>
        <form action="/Register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button>Register</button>
        </form>
        </div>

        <form action="/admin" >
            @csrf
            <button>Admin?</button>
        </form>

        <div style="border: 10px solid black;">
            <h2>Login</h2>
            <form action="/Login" method="POST">
                @csrf
                <input type="text" name="loginName" placeholder="name">
                <input type="password" name="loginPassword" placeholder="password">
                <button>Log in</button>
            </form>
            </div>

    @endauth

   
</body>
</html>