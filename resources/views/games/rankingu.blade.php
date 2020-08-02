@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
    <header>
        <meta charset="utf-8">
        <title>Game Reviews</title>
    </header>
    <body>
        <h1>ランキング</h1>
        <div class="row">
            <div class="col-sm-8">
                @foreach($weekly as $review)
                <table class="table nav nav-tabs nav-justified mb-3">
                　  <tr>
                        <th class="text-center nav-item"><a src="#" class="nav-link">週間</a></th>
                        <th class="text-center nav-item"><a src="#" class="nav-link">月間</a></th>
                        <th class="text-center nav-item"><a src="#" class="nav-link">年間</a></th>
                </tr>
                <tr class="table-bordered">
                    <td>{{ $review->game->name }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->score }}</td>
                    <td>{{ $review->content }}</td>
                </tr>
                <tr class="table-bordered">
                    <td>{{ $review->game->name }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->score }}</td>
                    <td>{{ $review->content }}</td>
                </tr>
                <tr class="table-bordered">
                    <td>{{ $review->game->name }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->score }}</td>
                    <td>{{ $review->content }}</td>
                </tr>
                <tr class="table-bordered	">
                    <td>{{ $review->content }}</td>
                    <td>{{ $review->content }}</td>
                    <td>{{ $review->score }}</td>
                    <td>{{ $review->content }}</td>
                </tr>
                </table>
                @endforeach
            </div>
        </div>
    </body>
</html>
@endsection