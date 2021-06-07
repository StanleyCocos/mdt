<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>事件统计记录</title>
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
<div style="width: 1300px; height: 50px; background-color: green; margin: 0 auto;">
    <ulid id="nav">
        <li>
            <div style="float: left; margin: 0 auto; height: 50px; background-color: #eeeeee; width: 25%; text-align: center; line-height: 50px;">
                <a href="/event/{{ $imei }}">列表</a>
            </div>

        </li>
        <li>
            <div style="float: left; margin: 0 auto; height: 50px; background-color: #fefefe; width: 25%; text-align: center; line-height: 50px;">
                <a href="/event/error/{{ $imei }}">查看错误事件</a>
            </div>
        </li>
        <li>
            <div style="float: left; margin: 0 auto; height: 50px; background-color: #eeeeee; width: 25%; text-align: center; line-height: 50px;">
                <a href="">筛选</a>
            </div>

        </li>

        <li>
            <div style="float: left; margin: 0 auto;  height: 50px; background-color: #eeeeee; width: 25%; text-align: center; line-height: 50px;">
                <a href="/event/clear/{{ $imei }}">清除设备</a>
            </div>
        </li>
    </ulid>
</div>


<table style="margin-top: 30px; width: 1300px">
    <tr bgcolor='#ccc'>
        <th>事件名</th>
        <th>版本</th>
        <th>平台</th>
        <th>时间</th>
        <th>imei</th>
        <th>事件名是否合法</th>
    </tr>

    @foreach ($data as $item)
        <tr align="center">
            <td style="font-weight: bold">{{ $item->name }}</td>
            <td>{{ $item->version }}</td>
            <td>{{ $item->client }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->imei }}</td>
            @if ($item->state)
                <td style="color: green">通过</td>
            @else
                <td style="color: red">失败</td>
            @endif
        </tr>
    @endforeach
</table>

<div style="margin-top: 20px">
    {{$data -> links() }}
</div>
</body>
</html>

<?php
