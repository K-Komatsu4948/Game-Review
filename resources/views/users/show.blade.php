@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <header>
        <meta charset="utf-8">
        <title>Game Reviews</title>
    </header>
    <body>
        <h1>レビュー一覧</h1>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                @foreach($reviews as $review)
                <tr class="table-bordered">
                    <td>{{ $review->game->name}}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->score }}</td>
                    <td>{{ $review->content }}</td>
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