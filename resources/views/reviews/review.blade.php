@extends('layouts.app')

@section('content')
   @if (count($reviews) > 0)
    <ul class="list-unstyled">
        @foreach($games as $game)
            <li class="media mb-3">
                <table border="1" align="left">
                    <tr class="w-20">
                        {{ $game->name }}
                    </tr>
                </table>
                <table border="1" align="left">
                    <tr class="w-20">
                        {{ $game->user }}
                    </tr>
                </table>
                <table border="1" align="left">
                    <tr class="w-20">
                        {{ $game->score }}
                    </tr>
                </table>
                <table border="1" align="left">
                    <tr class="w-40">
                        {{ $game->content }}
                    </tr>
                </table>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $reviews->links() }}
@endif
@endsection