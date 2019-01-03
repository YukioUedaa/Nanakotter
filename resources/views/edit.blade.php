<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>ツイートを編集</h1>
        @if (Auth::check())
            {{ \Auth::user()->name }}さん
            <table>
                <tr>
                    <th>id</th>
                    <th>tweet</th>
                    <th>date</th>
                </tr>
                <form action = "/home/update" method = "post">
                    @csrf
                    <tr>
                        <th>{{$tweet->id}}</th>
                        <th>
                            <input type = 'hidden' name = 'id' value = {{$tweet->id}}>
                            <input type = 'text' name = 'tweet' value = {{$tweet->tweet}}>
                        </th>
                        <th>{{$tweet->updated_at}}</th>
                    </tr>
                    <th>
                        <input type="submit" value = "更新">
                    </th>
                </form>
            </table>
        @endif
    </body>
</html>
