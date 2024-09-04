<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Post</title>
</head>
<body>
    <h2>Create new post</h2>
    <hr>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Name: </label>
            <input type="text" name="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="">Description: </label>
            <input type="text" name="description">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="">Category: </label>
            <input type="text" name="category">
            @error('category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="">User: </label>
            <select name="user_id" id="">
                <option value="">User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</body>
</html>