<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>ななこったー</h1>
        こんにちは
        @if (Auth::check())
            {{ \Auth::user()->name }}さん
            <a href="/auth/logout">ログアウト</a>
            <table>
                <form action = '/home' method = "post">
                    @csrf
                    <tr>
                        <th>message: </th>
                        <th><input type="text" name="tweet"></th>
                        <th><input type="submit" value="投稿"></th>
                    </tr>
                </form>
            </table>
        @else
            ゲストさん<br />
            <a href="/auth/login">ログイン</a>
            <a href="/auth/register">会員登録</a>
        @endif
            <table>
                <tr>
                    <th>id</th>
                    <th>tweet</th>
                    <th>date</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                @foreach($tweets as $tweetData)
                <tr>
                    <th>{{$tweetData['name']}}</th>
                    <th>{{$tweetData['tweet']}}</th>
                    <th>{{$tweetData['date']}}</th>
                    <th>
                        <form action= "/home/edit/{{$tweetData['id']}}" method = "post">
                            @csrf
                            @if ($tweetData['user_id'] == (\Auth::user()->id))
                                <input type = "hidden" name = 'id' value = "{{$tweetData['id']}}">
                                <input type = "submit" value= "○">
                            @endif
                        </form>
                    </th>
                    <th>
                        <form action= "/home/delete" method = "post">
                            @csrf
                            @if ($tweetData['user_id'] == (\Auth::user()->id))
                                <input type = "hidden" name = 'id' value = "{{$tweetData['id']}}">
                                <input type = "submit" value= "x">
                            @endif
                        </form>
                    </th>
                </tr>
                @endforeach
            </table>
    </body>
</html>
