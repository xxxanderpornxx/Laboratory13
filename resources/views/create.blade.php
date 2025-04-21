<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link the custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center">Create Post</h1>
                <p class="text-center">Fill out the form to create a new post</p>
             
                <form action="{{ route('storeNewPost') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                            <div class="invalid-feedback">Please enter a post title.</div>
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Post Content</label>
                            <textarea id="body" name="body" class="form-control" rows="5" required></textarea>
                            <div class="invalid-feedback">Please enter the post content.</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Create Post</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>