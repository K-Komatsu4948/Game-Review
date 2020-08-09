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
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item col-sm-4">
                        <a href="{{ route('rankingu.get') }}" class="nav-link">週間</a>
                    </li>
                    <li class="nav-item col-sm-4">
                        <a href="{{ route('monthly.get') }}" class="nav-link">月間</a>            
                    </li>
                    <li class="nav-item col-sm-4">
                        <a href="{{ route('yearly.get') }}" class="nav-link active">年間</a>
                    </li>
                </ul>
                
                <table class="table">
                <tr class="nav-item col-sm-12">
                    <th class="text-center">ゲーム名</th>
                    <th class="text-center">評価</th>
                    <th class="text-center">レビュー</th>
                　　</tr>
                @forelse($games as $game)
                <tr class="table-bordered">
                <td>{{  $game->name }}</td>
                <td>{{ $game->avgScore() }}</td>
                <td>
                @if ($game->latest_reviews())
                {{ $game->latest_reviews()->content }}
                @endif
                </td>
                </tr>
                @empty
                <p>まだ何も表示されていません。</p>
                @endforelse
                </table>
                </table>
            </div>
        </div>
    </body>
</html>
@endsection