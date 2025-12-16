<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>出退勤</title>
</head>
<body>
    <h1>出退勤画面</h1>

    <p>現在時刻：{{ $now }}</p>

    <form method="POST" action="{{ route('work.start') }}">
        @csrf
        <button type="submit">出勤</button>
    </form>

    <form method="POST" action="{{ route('work.end') }}">
        @csrf
        <button type="submit">退勤</button>
    </form>
</body>
</html>
