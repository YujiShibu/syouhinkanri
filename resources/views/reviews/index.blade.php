<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レビュー投稿</title>

    <style>
        body {
            font-family: sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
        }
        h2, h3 {
            margin-top: 0;
        }
        .item {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
        }
        .item img {
            border-radius: 4px;
        }
        .review {
            border-top: 1px solid #ddd;
            padding: 12px 0;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background: #3490dc;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            border: none;
        }
        .btn-secondary {
            background: #6c757d;
        }
        textarea, select {
            width: 100%;
            margin-bottom: 12px;
        }
    </style>
</head>

<body>
<div class="container">

    <a href="{{ route('items.index') }}" class="btn btn-secondary">
        商品一覧へ戻る
    </a>

    <h2>{{ $item->name }} のレビュー</h2>

    <div class="item">
        @if ($item->image_path)
            <img src="{{ asset('storage/' . $item->image_path) }}" height="120">
        @endif

        <div>
            <p>
                平均評価：
                @if ($item->reviews->count() > 0)
                    {{ number_format($item->reviews->avg('rating'), 2) }}
                    ({{ $item->reviews->count() }})
                @else
                    未評価
                @endif
            </p>
        </div>
    </div>

    <h3>レビュー投稿</h3>

    <form action="{{ route('items.reviews.store', $item->id) }}" method="POST">
        @csrf

        <label>評価</label>
        <select name="rating">
            @for ($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <label>コメント</label>
        <textarea name="review" rows="5"></textarea>

        <button type="submit" class="btn">投稿</button>
    </form>

    <h3>レビュー一覧</h3>

    @forelse ($reviews as $review)
        <div class="review">
            ★ {{ $review->rating }}（{{ $review->user->name }}）<br>
            {{ $review->review }}
        </div>
    @empty
        <p>レビューはまだありません</p>
    @endforelse

</div>
</body>
</html>
