<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Post</title>
</head>
<body>
    <div class="container">
        <h2>Edit Post</h2>
        
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('posts.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id"  value="{{ $post->id }}">
            <div>
                <label for="title">Name: </label>
                <input type="text" name="name" value="{{ $post->name }}">
            </div>

            <div>
                <label for="content">Description: </label>
                <input name="description" rows="5" value="{{ $post->description }}">
            </div>

            <div>
                <label for="content">Category: </label>
                <input name="category" value="{{ $post->description }}">
            </div>

            <div>
                <label for="user_id">User: </label>
                <select name="user_id">
                    <option value="">Default</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>