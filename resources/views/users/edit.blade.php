@extends('layouts.app')

@section('content')
<h1>社員編集</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>名前</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
    </div>

    <div>
        <label>所属課</label><br>
        <select name="group">
            <option value="">選択してください</option>
            <option value="営業課" {{ old('group', $user->group) === '営業課' ? 'selected' : '' }}>営業課</option>
            <option value="人事課" {{ old('group', $user->group) === '人事課' ? 'selected' : '' }}>人事課</option>
            <option value="総務課" {{ old('group', $user->group) === '総務課' ? 'selected' : '' }}>総務課</option>
            <option value="開発課" {{ old('group', $user->group) === '開発課' ? 'selected' : '' }}>開発課</option>
            <option value="経理課" {{ old('group', $user->group) === '経理課' ? 'selected' : '' }}>経理課</option>
        </select>
    </div>

    <div>
        <label>メール</label><br>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
    </div>

    <div>
        <label>電話番号</label><br>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
    </div>

    <div>
        <label>パスワード（変更時のみ）</label><br>
        <input type="password" name="password">
    </div>

    <button type="submit">更新</button>
</form>
@endsection
