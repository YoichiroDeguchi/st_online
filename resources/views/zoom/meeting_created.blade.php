<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoom Meeting Created</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Zoom Meeting Created</h1>
        <p><strong>Meeting ID:</strong> {{ $meeting['id'] }}</p>
        <p><strong>Topic:</strong> {{ $meeting['topic'] }}</p>
        <p><strong>Start Time:</strong> {{ $meeting['start_time'] }}</p>
        <p><strong>Duration:</strong> {{ $meeting['duration'] }} minutes</p>
        <p><strong>Join URL:</strong> <a href="{{ $meeting['join_url'] }}" target="_blank">{{ $meeting['join_url'] }}</a></p>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
