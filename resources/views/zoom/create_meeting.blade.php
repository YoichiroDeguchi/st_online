<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Zoom Meeting</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create Zoom Meeting</h1>
        <form action="{{ route('create.meeting') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="topic">Meeting Topic:</label>
                <input type="text" class="form-control" id="topic" name="topic" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration (minutes):</label>
                <input type="number" class="form-control" id="duration" name="duration" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Meeting</button>
        </form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
