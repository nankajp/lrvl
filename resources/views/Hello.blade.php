<!DOCTYPE html>
<html>
    <head>
        <title>Laravel TEST Hello</title>
    </head>
    <body>
        <div>{{ $test }}</div>

        <form action='/form' method="POST" >
            @csrf
            <input id="item1" name="item1" type="text" value="" required/><br>
            <input id="item2" name="item2" type="text" value=""/><br>
            <input type="submit" value="Submit Button">
        </form>

        <!-- バリデーションエラーメッセージ -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </body>
</html>