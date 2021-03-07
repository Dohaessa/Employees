<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Emolyee</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <section class="container py-3">
        <div class="w-50 mx-auto">
            <h1 class="text-center text-primary">Edit data</h1>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <form action="{{ route('employees.update', $id)}}" method="post">
                @csrf

                <div class="form-group">
                    <label >Employee Name</label>
                <input type="text" name="txtName" class="form-control" value="{{$emp->name}}">
                </div><!-- Name -->
    
                <div class="form-group">
                    <label >Employee Job</label>
                    <input type="text" name="txtJob" class="form-control" value="{{$emp->job}}">
                </div><!-- job -->
    
                <div class="form-group">
                    <label >Employee City</label>
                    <input type="text" name="txtCity" class="form-control" value="{{$emp->city}}">
                </div><!-- City -->
    
                <div class="form-group text-center">
                    
                    <input type="submit" value="Update Employee" name="add" class="btn btn-primary btn-lg w-50">
                </div><!-- City -->
    
                @method('PUT')
                
                
                </form>

        </div> <!-- w-50 -->

    </section>
    


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>