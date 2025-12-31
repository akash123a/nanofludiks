<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Slider</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-lg p-4" style="border-radius: 12px;">

                    <!-- Cross Button -->
                    <a href="{{ route('admin.dashboard') }}" class="btn-close position-absolute top-0 end-0 m-3"
                        aria-label="Close"></a>
                    <h2 class="text-center mb-4 fw-bold">Add Slider</h2>

                    <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="fw-semibold">Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter slider title">
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Subtitle:</label>
                            <input type="text" name="subtitle" class="form-control" placeholder="Enter subtitle">
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Slider Image:</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mt-3 fw-semibold">
                            Add Slider
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
