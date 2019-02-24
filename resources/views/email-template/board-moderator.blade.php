<!DOCTYPE html>
<html>
<head>
    <title>Job post</title>
</head>

<body>
<div >
    <h3>Author: {{$data['author']}}</h3>
    <h2>Title : {{$data['title']}}</h2>
    <h3>Content :{{$data['description']}}</h3>
</div>
<div style="margin: auto">
    <div>
        <button style="padding: 10px;width: 500px;background: #1b4b72"><a href="{{$data['approved_link']}}">Mark as publish</a></button><br>
    </div>
    <div>
        <button style="padding: 10px;width: 500px;background: red; text-decoration: none"><a href="{{$data['spam_link']}}">Mark as spam</a></button>
    </div>
</div>
</body>

</html>