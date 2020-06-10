@extends('layouts.default')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    {{-- エラーメッセージを出力 --}}
    @foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
    @endforeach

    {{-- 以下にフォームを追記します。 --}}
    <form method="post" action="{{ url('/messages') }}" enctype = "multipart/form-data">
        {{-- LaravelではCSRF対策のため以下の一行が必須です。 --}}
        {{ csrf_field() }}
        <div>
            <label>
                名前:
                <input type="text" name="name" class="name_field" placeholder="お名前を入力">
            </label>
        </div>

        <div>
            <label>
                コメント：
                <input type="text" name="body" class="comment_field" placeholder="コメントを入力">
            </label>
        </div>

        {{-- ファイルアップロード用のinputを追加します。 --}}
        <div>
            <label>
                画像：
                <input type="file" name="image">
            </label>
        </div>

        <div>
            <input type="submit" value="投稿">
        </div>
    </form>
    <ul>
        @forelse($messages as $message)
            <li>{{ $message->name }}: {{ $message->body }}  {{ $message->created_at }}</li>
        @empty
            <li>メッセージはありません。</li>
        @endforelse
    </ul>
@endsection