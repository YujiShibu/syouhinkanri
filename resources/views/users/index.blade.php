@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- タイトル＋新規登録 --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">社員一覧</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            + 新規登録
        </a>
    </div>

    {{-- 成功メッセージ --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- 一覧テーブル --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-hover text-center align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%">ID</th>
                        <th>名前</th>
                        <th>所属課</th>
                        <th>メール</th>
                        <th>電話番号</th>
                        <th style="width: 15%">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->group_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? '未登録' }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    編集
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
