@extends('layouts.app')

@section('content')
  @if (Auth::check())
        <div class="row">
            <aside class="col-sm-8">
                @include('games.rankingu')
            </aside>
        </div>
    @else
        <div class="col-sm-8">
            @include('auth.register')
        </div>
    @endif
@endsection