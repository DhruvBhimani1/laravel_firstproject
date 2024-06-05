<h1>
    {{$name}}
</h1>
<h1>
    {{$id}}
</h1>
@for ($i = 0; $i < $id; $i++)
    <h1>{{$i}}</h1>
@endfor

@php
    $arr =[1,2,3,4,5,6,7];
@endphp
@foreach ($arr as $key-> $item)
    {{$key}}
    {{$item}}
@endforeach