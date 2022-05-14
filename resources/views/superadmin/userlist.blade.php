@extends('superadmin.app')
@section('content')

<div class="row">

</div>

<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if(Session::has('error'))
    <div class="row">
        <span class="text-danger">
            {{ Session::get('error') }}
            @php
            Session::forget('error');
            @endphp
        </span>
    </div>
    @endif

    <div class="row">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">balanced</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($userlists as $userlist)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$userlist->name}}</td>
                    <td>{{$userlist->balanced->balanced_amount}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection