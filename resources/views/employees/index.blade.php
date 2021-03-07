<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL Employees</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <h1 class="text-center text-primary">ADD New data</h1>

    <section class="container py-4 text-center">
        <div>

            <a href="{{ route('employees.create') }}" class="btn btn-primary w-50">Add New Employee</a>
        </div>

        @if (Session::has('success') )
        <div class="alert alert-success">
        <h3>{{Session::get('success')}}</h3>

        </div>
            
        @endif

        <table class="table table-bordered table-striped w-50 mx-auto ">

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Job</th>
                <th>City</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
@foreach ($emps as $emp)
    

            <tr>
            <td>{{$emp->id}}</td>
            <td>{{$emp->name}}</td>
            <td>{{$emp->job}}</td>
            <td>{{$emp->city}}</td>

            <td><img src="{{ asset('uploads/images/employees/'.$emp->image) }}" alt="" width="100"></td>
            <td><a href="{{ route('employees.edit', [$emp->id]) }}">Edit</a></td>
                <td>
            <form action="{{ route('employees.destroy', [$emp->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-link">
            
            </form>
                </td>

            </tr>

            @endforeach


        </table>

    </section>
   
    

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
