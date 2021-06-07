<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>api访问记录</title>
    <script type="text/javascript">
        setTimeout(function(){
            setInterval(function(){
                window.location.reload();
            },1000)
        },2000);

    </script>
    <style>
        table {
            margin: auto;
            border: 1px solid #000!important;
        }
        table td{
            border: 1px solid #000!important;
            padding: 5px 12px;
        }
        table th{
            border: 1px solid #000!important;
        }
    </style>

    <style>
        #nav{
            margin:50px auto;
            height:40px;
            background-color:#690;
        }
        #nav ul{
            list-style:none;
            margin-left:50px;
        }
        #nav li{
            display:inline;
        }
    </style>


</head>
<body>

<table style="margin-top: 30px; width: 1300px">
    <tr bgcolor='#ccc'>
        <th>接口</th>
        <th>版本</th>
        <th>平台</th>
        <th>时间</th>
        <th>imei</th>
        <th>详情</th>
    </tr>

    @foreach ($data as $item)
        <tr align="center">
            <td style="font-weight: bold">{{ $item->url }}</td>
            <td>{{ $item->version }}</td>
            <td>{{ $item->client }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->imei }}</td>
            <td><a href="/apiDetail/{{ $item->id }}">详情</a></td>
        </tr>
    @endforeach
</table>

<div style="margin-top: 20px">
    {{$data -> links() }}
</div>
</body>
</html>
