<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content=""{{ csrf_token() }}>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('test.store') }}" method="post">
    @csrf
    <label for="name">Name</label><input type="text" name="name" id="name"><br>
    <label for="body">Body</label><input type="text" name="body" id="body"><br>
    <input type="submit" value="Confirm">
</form>
</body>
</html>
