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
                    <th scope="col">name in words</th>
                    <th scope="col">amount</th>
                    <th scope="col">balanced</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach($notes as $note)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$note->amount_in_words}}</td>
                    <td>{{$note->amount}}</td>
                    <td>{{$note->qutanty_avliable}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</div>

@endsection