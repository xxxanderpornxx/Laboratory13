<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link the custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center">{{ $post->title }}</h1>
                <p class="text-center text-muted">{{ $post->created_at->format('F j, Y') }}</p>

                <div class="post-content mt-3">
                    <p>{{ $post->body }}</p>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>