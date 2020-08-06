@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <header>
        <meta charset="utf-8">
        <title>Game Reviews</title>
    </header>
    <body>
        <h1>マイレビュー一覧</h1>
        <div class="row">
            <div class="col-sm-12">
                <table class="table col-sm-12">
                @foreach($reviews as $review)
                <tr class="table-bordered">
                    <td>{{ $review->game->name}}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->score }}</td>
                    <td>{{ $review->content }}</td>
                    <td>
                        @if (Auth::id() == $review->user_id)
                        {{-- 投稿削除ボタンのフォーム --}}
                        {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
                @endforeach
                
                </table>
            </div>
        </div>
    </body>
</html>
{{-- ページネーションのリンク --}}
{{ $reviews->links() }}
@endsection