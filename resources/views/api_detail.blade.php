<!DOCTYPE html>
<html>
<head>
    <title>接口详情</title>
    <link href="{{ asset('jsonTree/jsonTree.css') }}" rel="stylesheet" />
    <script src="{{ asset('jsonTree/jsonTree.js') }}"></script>
    <style>
        ul{
            list-style-type:none;
            margin: 0;
            padding: 0;
        }
        li {
            list-style-type:none;
            margin: 0;
            padding: 0;
        }

    </style>

</head>



<body style="padding: 0; margin: 0">
<div style="text-align: center; background-color: #EEEEEE; padding: 20px">
    <span style="text-align: center;  height: 40px; font-size: 30px">100App接口访问记录详情</span>
</div>
<p>
    <span>
        <span style="color: #777777">请求接口: </span>
        <span style="color: #600100; font-size: 20px;">
            {{ $detail->url }}
        </span>
    </span>
</p>

<p>
    <span>
        <span style="color: #777777">请求设备: </span>
        <span style="color: #600100; font-size: 20px;">
            {{ $detail->imei }}
        </span>
    </span>
</p>

<p>
    <span>
        <span style="color: #777777">请求版本: </span>
        <span style="color: #600100; font-size: 20px;">
            {{ $detail->version }}
        </span>
    </span>
</p>

<p>
    <span>
        <span style="color: #777777">请求终端: </span>
        <span style="color: #600100; font-size: 20px;">
            {{ $detail->client }}
        </span>
    </span>
</p>

<p>
    <span>
        <span style="color: #777777">请求时间:</span>
        <span style="color: #600100; font-size: 20px;">
            {{$detail->created_at}}
        </span>
    </span>
</p>

<p>
    <span>
        <span style="color: #777777">请求状态:</span>
        <span style="color: #600100; font-size: 20px;">
            {{$detail->code}}
        </span>
    </span>
</p>


<p>
    <span><span style="color: #777777">请求参数:</span> <span id="wrapper_params"></span></span>
</p>

<p>
    <span><span style="color: #777777">请求头部: </span> <span id="wrapper_header"></span></span>
</p>

<p>
    <span><span style="color: #777777">请求结果: </span><span id="wrapper_result"></span></span>
</p>



<script type="text/javascript">
    var wrapper = document.getElementById("wrapper_result");
    var jsons = {!! $detail->result !!};
    var tree = jsonTree.create(jsons, wrapper);
    tree.expand(function(node) {
        return node.childNodes.length < 5;
    });
</script>

<script type="text/javascript">
    var wrapper = document.getElementById("wrapper_params");
    var jsons = {!! $detail->params !!};
    var tree = jsonTree.create(jsons, wrapper);
    tree.expand(function(node) {
        return true;
    });
</script>

<script type="text/javascript">
    var wrapper = document.getElementById("wrapper_header");
    var jsons = {!! $detail->header  !!};
    var tree = jsonTree.create(jsons, wrapper);
    tree.expand(function(node) {
        return true;
    });
</script>
</body>
</html>

