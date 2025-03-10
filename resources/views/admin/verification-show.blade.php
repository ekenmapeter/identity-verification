<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div class="container">
        <h1>Verification Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $verification->first_name }} {{ $verification->last_name }}</h5>
                <p class="card-text">
                    <strong>Created At:</strong> {{ $verification->created_at }}<br>
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <h6>Front Image</h6>
                        <img src="{{ Storage::url($verification->front_image) }}" class="img-fluid" alt="Front Image">
                    </div>
                    <div class="col-md-4">
                        <h6>Back Image</h6>
                        <img src="{{ Storage::url($verification->back_image) }}" class="img-fluid" alt="Back Image">
                    </div>
                    <div class="col-md-4">
                        <h6>Selfie Image</h6>
                        <img src="{{ Storage::url($verification->selfie_image) }}" class="img-fluid" alt="Selfie Image">
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
