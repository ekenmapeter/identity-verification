<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="d-flex">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Verification Requests</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Front Image</th>
                    <th>Back Image</th>
                    <th>Selfie</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($verifications as $verification)
                <tr>
                    <td>{{ $verification->id }}</td>
                    <td>{{ $verification->first_name }} {{ $verification->last_name }}</td>
                    <td><img src="{{ asset('storage/' . $verification->front_image) }}" width="100"></td>
                    <td><img src="{{ asset('storage/' . $verification->back_image) }}" width="100"></td>
                    <td><img src="{{ asset('storage/' . $verification->selfie_image) }}" width="100"></td>
                    <td>{{ $verification->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.verification.show', $verification->id) }}" class="btn btn-primary btn-sm">Preview</a>
                        <form action="{{ route('admin.verification.destroy', $verification->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this verification?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $verifications->links() }}
    </div>
</body>
</html>
