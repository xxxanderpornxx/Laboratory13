<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!-- Link the CSS file directly -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Blog App</h1>
        <p class="text-center">Manage your blog posts below.</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Available Blogs</h3>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Blog</a>
        </div>

        <table id="blogTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>

                    <th>Title</th>
                    <th>Created On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(is_iterable($posts))
                    @foreach($posts as $index => $post)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>

                            <td class="text-center">{{ $post->title }}</td>
                            <td class="text-center">{{ $post->created_at->format('F j, Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p class="text-center text-muted">No posts available.</p>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Logout Button -->
    <div class="position-absolute bottom-0 start-0 m-3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Logout</button>
        </form>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#blogTable').DataTable();
        });
    </script>
</body>
</html>
