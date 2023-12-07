<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Курсы.Ру</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-disabled="true" href="/admin">Панель администратора</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-disabled="true" href="/">Выход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- 
<main>
<div class="container" style="margin-top: 20px;">
<h2>Список заявок</h2>
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Email</th>
<th scope="col">Имя клиента</th>
<th scope="col">Курс</th>
<th scope="col">Дата заявки</th>
<th scope="col">Статус</th>
</tr>
</thead>
<tbody>
 @foreach ($all_aplications as $item)
<tr>

<th scope="row">{{$item->id}}</th>
<td>{{$item->email}}</td>
<td>{{$item->name}}</td>
<td>{{$item->course_id}}</td>
<td>{{$item->created_at}}</td>
<td>{{$item->is_confirm ==0 ? 'Не подтверждена' : 'Подтверждена'}}</td>
 @if ($item->is_confirm == 0)
<td><a href="/aplication/{{$item->id}}/confirm"><img src="/images/free-icon-check-1828640.png" style="width: 25px; height:25px"></a></td>

@else <td></td>
@endif
</tr>
@endforeach
</tbody>
</table>
<section>
    <div class="container">
        <h2 class="m-3">Создания курса</h2>
        <form>
            <div class="mb-3">
            <label for="title" class="form-label">Название курса</label>
            <input type="text" class="form-control" id="title">
            </div>
            <div class="mb-3">
            <label for="description" class="form-label">Описание курса</label>
            <textarea class="form-control" id="description" rows="2"></textarea>
            </div>
            <div class="mb-3">
            <label for="cost" class="form-label">Стоимость курса</label>
            <input type="text" class="form-control" id="cost">
            </div>
            <div class="mb-3">
            <label for="duration" class="form-label">Длительность курса (в неделях)</label>
            <input type="number" class="form-control" id="duration">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</section>
</div>
</main>
</body>
</html>
<main> --}}
    <section>
        <div class="container">
            <h2 class="m-3">Список заявок</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Имя клиента</th>
                        <th scope="col">Курс</th>
                        <th scope="col">Дата заявки</th>
                        <th scope="col">Статус</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_aplications as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->course_id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td> {{ $item->id_confirm == 0 ? 'Не подтверждена' : 'Подтверждена' }} </td>
                            @if ($item->id_confirm == 0)
                                <td>
                                    <a href="/aplication/{{ $item->id }}/confirm">
                                        <img src="\images\free-icon-check-1828640.png" style="width: 25px; height:25px"
                                            alt="Принять">
                                    </a>
                                </td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>


    <section>
        <div class="container">
            <h2 class="m-3">Создание курса</h2>
            <form action="/course/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название курса</label>
                    <input type="text" class="form-control" id="title" name="title">
                    @error('title')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание курса</label>
                    <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                    @error('description')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Стоимость курса</label>
                    <input type="text" class="form-control" name="cost" id="cost">
                    @error('cost')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Длительность курса (в неделях)</label>
                    <input type="number" class="form-control" name="duration" id="duration">
                    @error('duration')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Изображение курса</label>
                    <input class="form-control" type="file" name="image" id="image">
                    @error('image')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Категория курса</label>
                    <select class="form-select" name="category_id">
                        <option selected>Категория курса</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <section>
        <div class="container">
            <h2 class="m-3">Создание категории</h2>
            <form action="/category/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название категории</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    </main>
</body>

</html>
