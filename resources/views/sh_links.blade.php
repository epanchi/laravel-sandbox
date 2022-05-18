@extends('layout')

@section('content')
<style>
    table{
        border: 1px grey;
    }
    </style>
 
<h1>Short Url list</h1>
<table border="1" style="border: 1px">
    <th>
        <td>Code</td>
        <td>Url</td>
        <td>Action </td>
    </th>
    @foreach($results as $item)
    <tr style="border: 1px; border-color:gray;">
        <td>
            {{$item->code}}
        </td>
        <td>
            {{$item->url}}
        </td>
        <td>
            Show metrics (url)
        </td>
    </tr>
    @endforeach
</table>
@endsection