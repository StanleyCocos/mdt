<!DOCTYPE html>
<html>
<head>
    <title>接口详情</title>
    <link href="{{asset('jsonTree/jsonTree.css')}}" rel="stylesheet" />
    <script src="{{asset('jsonTree/jsonTree.js')}}"></script>
</head>



<body style="padding: 0; margin: 0">
<h2 style="text-align: center; background-color: #EEEEEE; height: 40px">100App接口访问记录详情</h2>
<p>
    <span>请求接口: {{$detail->url}}</span>
</p>

<p>
    <span>请求设备: {{$detail->imei}}</span>
</p>

<p>
    <span>请求版本: {{$detail->version}}</span>
</p>

<p>
    <span>请求终端: {{$detail->client}}</span>
</p>

<p>
    <span>请求时间: {{$detail->created_at}}</span>
</p>

<p>
    <span>请求参数: {{$detail->params}}</span>
</p>

<p>
    <span>请求头部: {{$detail->header}}</span>
</p>

<p>
    <span>请求状态: {{$detail->code}}</span>
</p>

<p>
    <span>返回结果: <span id="wrapper"></span></span>
</p>


<!-- <p>
		<span>原生数据: {{$detail->result}} </span>
	</p> -->


<script type="text/javascript">
    var wrapper = document.getElementById("wrapper");
    // var app = json({{$detail->result}});
    // Get json-data by javascript-object
    // var data = json_decode({{$detail->result}});
    var jsons = {!!$detail->result!!};
    //var data = json(jsons);
    // or from a string by JSON.parse(str) method
    // var dataStr = {{$detail->result}};
    // try {
    //     data = JSON.parse(dataStr);
    // } catch (e) {}
    // Create json-tree
    var tree = jsonTree.create(jsons, wrapper);
    // Expand all (or selected) child nodes of root (optional)
    // tree.expand(function(node) {
    //    return node.childNodes.length < 2 || node.label === 'phoneNumbers';
    // });
</script>

</body>
</html>

