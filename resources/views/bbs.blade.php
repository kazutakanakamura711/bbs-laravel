<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>bbs_laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="top">
        <a href="#title">Top</a>
    </div>
    <div id="title">
        <div class="move">
            <div class="top">

            </div>
            <div class="under">

            </div>
        </div>
        <div>
            <h1>BBS Laravel</h1>
        </div>
        <div class="move">
            <div class="top">

            </div>
            <div class="under">

            </div>
        </div>
    </div>

    <form action="/bbs_add" method="post">
        @csrf
        <div>
            <div class="viewNameArea">
                <div class="label">
                    <label for="name">Name</label>
                </div>
                <input type="text" id="name" name="name">
                @if (!empty($errors->first('name')))
                    <p class="error">{{ $errors->first('name') }}</p>
                @endif
            </div>
        </div>
        <div>
            <div class="messageArea">
                <div class="label">
                    <label for="message">Message</label>
                </div>
                <textarea name="message" id="message" cols="30" rows="10"
                ></textarea>
                @if (!empty($errors->first('message')))
                    <p class="error">{{ $errors->first('message') }}</p>
                @endif
            </div>
        </div>
        <div class="send">
            <button type="submit">Send</button>
        </div>
    </form>

    <div class="board">
        @foreach ($bbs_data as $data)
            <div class="block">
                <div class="first">
                    <div class="id">
                        <p>no.{{ $data->id }}</p>
                    </div>
                    <div class="created">
                        <p>{{ $data->created }}</p>
                    </div>
                    <div class="name">
                        <p>Name:{{ $data->name }}</p>
                    </div>
                </div>
                <div class="second">
                    <div>
                        <p>{{ $data->message }}</p>
                    </div>
                </div>
                <div class="delete">
                    <button onclick="bbs_delete('{{ $data->id }}')">Delete</button>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>

<script>
    function bbs_delete(id) {
        var bbs_id = id;
        if (confirm('削除しますか？')) {
            alert('削除しました。');
            location.href = "/bbs_delete/" + bbs_id;
        }
    }
</script>
