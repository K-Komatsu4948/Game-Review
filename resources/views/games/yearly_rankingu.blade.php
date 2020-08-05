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
                @foreach($yearly as $rankingu)
                <table class="table nav nav-tabs nav-justified mb-3">
                <tr class="nav-item">
                        <th class="text-center nav-item"><a href="{{ route('rankingu.get', ['id' => $rankingu->id]) }}" class="nav-link">週間</a></th>
                        <th class="text-center nav-item"><a href="{{ route('monthly.get', ['id' => $rankingu->id]) }}" class="nav-link">月間</a></th>
                        <th class="text-center nav-item"><a href="{{ route('yearly.get', ['id' => $rankingu->id]) }}" class="nav-link">年間</a></th>
                        
                </tr>
                <tr class="table-bordered">
                    <td>{{ $rankingu->game->name }}</td>
                    <td>{{ $rankingu->score }}</td>
                    <td>{{ $rankingu->content }}</td>
                </tr>
                <tr class="table-bordered">
                    <td>{{ $rankingu->game->name }}</td>
                    <td>{{ $rankingu->score }}</td>
                    <td>{{ $rankingu->content }}</td>
                </tr>
                <tr class="table-bordered">
                    <td>{{ $rankingu->game->name }}</td>
                    <td>{{ $rankingu->score }}</td>
                    <td>{{ $rankingu->content }}</td>
                </tr>
                <tr class="table-bordered">
                    <td>{{ $rankingu->game->name }}</td>
                    <td>{{ $rankingu->score }}</td>
                    <td>{{ $rankingu->content }}</td>
                </tr>
                </table>
                @endforeach
            </div>
        </div>
    </body>
</html>
@endsection