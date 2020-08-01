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
                <ul class="nav nav-tabs nav-justified mb-3">
                    <li class="nav-item"><a href="#" class="nav-link">週間</a></li>
                    @foreach($weekly as $review)
            　　    　<li class="media mb-3">
                　       <table border="1" align="left">　
                　           <tr class="w-20">
                                {{ $weekly->game->name }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-20">
                                {{ $weekly->user->name }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-20">
                                {{ $weekly->score }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-40">
                                {{ $weekly->content }}
                            </tr>
                        </table>
                    </li>
                    @endforeach
                    <li class="nav-item"><a href="#" class="nav-link">月間</a></li>
                    @foreach($monthly as $review)
            　　    　<li class="media mb-3">
                　       <table border="1" align="left">　
                　           <tr class="w-20">
                                {{ $monthly->game->name }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-20">
                                {{ $monthly->user->name }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-20">
                                {{ $monthly->score }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-40">
                                {{ $monthly->content }}
                            </tr>
                        </table>
                    </li>
                    @endforeach
                    <li class="nav-item"><a href="#" class="nav-link">年間</a></li>
                    @foreach($yearly as $review)
                    　<li class="media mb-3">
                　       <table border="1" align="left">　
                　           <tr class="w-20">
                                {{ $yearly->game->name }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-20">
                                {{ $yearly->user->name }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-20">
                                {{ $yearly->score }}
                            </tr>
                        </table>
                        <table border="1" align="left">
                            <tr class="w-40">
                                {{ $yearly->content }}
                            </tr>
                        </table>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
@endsection