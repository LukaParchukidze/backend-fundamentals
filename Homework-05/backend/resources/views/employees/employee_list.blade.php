@extends('employees.home')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@section('content')
    <table>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Position</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->surname }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->phone }}</td>
                <td><a id="is-hired" url="{{ route('employees.switchHired', [$employee]) }}" style="color: purple; text-decoration: underline;">@if($employee->is_hired == true) Hired @else Not Hired @endif</a></td>
                <td><a href="{{route('employees.edit', [$employee])}}">EDIT</a></td>
            </tr>
        @endforeach
    </table>
@endsection

<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '#is-hired', function (event) {
            event.preventDefault();

            const $this = $(this);

            if ($this.text().trim() === "Hired") {
                $this.closest('#is-hired').text('Not Hired');
                $this.closest('#is-hired').css('color', 'red');
            } else if ($this.text().trim() === "Not Hired") {
                $this.closest('#is-hired').text('Hired');
                $this.closest('#is-hired').css('color', 'green');
            }

            $.ajax({
                type: 'PATCH',
                url: $this.attr('url'),
            })
        })
    });
</script>
