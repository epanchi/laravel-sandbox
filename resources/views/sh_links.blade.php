@extends('layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif


    <form method='POST' action="{{ route('generate.shorten.link.post') }}">
        @csrf
        <input type="text" name="link" class="form-control">
        @if ($errors->has('link'))
            <span class="help-block">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
        @endif

        <button class="btn" type='submit'>Send</button>
    </form>

    <h1>Short Url list</h1>
    <table class="table">
        <th>
        <td>Code</td>
        <td>Url</td>
        <td>Action </td>
        </th>
        @foreach ($results as $item)
            <tr style="border: 1px; border-color:gray;">
                <td>
                    {{ $item->code }}
                </td>
                <td>
                    {{ $item->url }}
                </td>
                <td>
                    Show metrics (url)
                </td>
            </tr>
        @endforeach
    </table>
@endsection
