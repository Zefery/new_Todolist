<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo list</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <div class="container vh-100">
        <div class="row h-100 ">
            <div class="col-11 col-md-8 col-lg-6 mx-auto my-auto shadow-lg p-3 bg-body-secondary rounded">
                <h1 class="text-center">Todo List</h1>

                <form action="/todo/create" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="todo" type="text" class="form-control" placeholder="What do you want to do?">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-save"></i></button>
                    </div>
                </form>
                
                <ul class="list-group list-group-horizontal-xxl list-group-flush overflow-auto" style="max-height: 350px;">

                    @foreach ($todos as $todo)
                    
                        <li class="list-group-item d-flex mb-3 rounded {{( $todo ->status)? 'list-group-item-success' : '' }}">
                            
                            <div class="me-auto p-2">
                                @if ($todo->status) {{-- ($todo->status == true) --}}
                                    <del>{{ $todo->todo }}</del> {{-- Mau test aja --}}                     
                                @else
                                    {{ $todo->todo }} 
                                @endif
                            </div>
                            
                            <a class="btn btn-light p-2 bg-{{( $todo->status)? 'success-subtle' : 'success' }}" style="margin-right: 10px" href="/todo/update/{{ $todo->id }}">
                                <i class="bi-{{( $todo->status)? 'bi bi-recycle' : 'bi bi-check-square' }}"></i>
                            </a>

                            <a class="btn btn-light p-2 bg-{{( $todo->status)? 'danger-subtle' : 'danger' }}" href="/todo/delete/{{ $todo->id }}">
                                <i class="bi bi-x-square"></i>
                            </a>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>