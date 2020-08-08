@extends('layouts.app')

@section('content')
<div class="row">
    <div class = "col-sm-10">
            <h3 class="brown border">ゲーム検索</h3>
            {!! Form::open(['route' => 'search.get', 'method' => 'get']) !!}
            <div class="form-group">
                <label>ゲーム名</label><br>
                <input type="text" name= "name" class="col-sm-12">
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
            　　{!! Form::close() !!}
            </div>
            <table class="table col-sm-12">
                @foreach($data as $game)
                <tr class="table-bordered">
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->content }}</td>
                    @if (Auth::user()->hasReview($game->id))
                    <td>{{ Form::hidden('game_id', $game->id,  ['id' => 'game_id']) }}</td>
                    @else
                    <td>{!! link_to_route('reviews.create', '投稿',  ['game' => $game->id]) !!}</td>
                    @endif
                </tr>
                @endforeach
            </table>
        {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
    </div>
</div>
@endsection