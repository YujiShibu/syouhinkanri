@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>社員一覧</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        + 新規登録
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>所属課</th>
            <th>メール</th>
            <th>電話番号</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->department }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone ?? '未登録' }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}"
                    class="btn btn-sm btn-warning me-1">
                    編集
                </a>

                <form action="{{ route('users.destroy', $user) }}"
                        method="POST"
                        class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('削除しますか？')">
                        削除
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
