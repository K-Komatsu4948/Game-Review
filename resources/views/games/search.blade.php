@extends('layouts.app')

@section('content')
<div class="row">
    <div class = "col-sm-8">
        <div class="text-left">
            <h3 class="brown border p-4">ゲーム検索</h3>
            {!! Form::open(['route' => 'search.get', 'method' => 'get']) !!}
            <div class="form-group">
                <label>ゲーム名</label><br>
                <input type="text" name= "name" class="text-align: left col-sm-12">
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
            　　{!! Form::close() !!}
            </div>
            <div class="container">
                <div class="col-sm-12">
                            <table class="table ">
                                <tr class="table-bordered">
                                        @foreach($data as $game)
                                        <td>{{ $game->name }}</td>
                                        <td>{!! link_to_route('reviews.create', '投稿',  ['game' => $game->id]) !!}</td>
                                        @endforeach
                                </tr>
                            </table>
                </div>
            </div>
        </div>
        {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
    </div>
</div>
@endsection