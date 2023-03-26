<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoom Meeting Created</title>
</head>
<body>
    <h1>申し込みが完了しました</h1>
    <h2>{{ $meeting['topic'] }}</h2>
    <p><strong>Meeting ID:</strong> {{ $meeting['id'] }}</p>
    <p><strong>Start Time:</strong> {{ $meeting['start_time'] }}</p>
    <p><strong>Duration:</strong> {{ $meeting['duration'] }} minutes</p>
    <p><strong>Join URL:</strong> <a href="{{ $meeting['join_url'] }}">{{ $meeting['join_url'] }}</a></p>
</body>
</html>
