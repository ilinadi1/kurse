<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курсы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>
<style>
    .hero {
        height: 75vh;
        width: 100%;
        overflow: hidden;
        background-image: url('images/cover.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50% 20%;

    }
</style>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Курсы.Ру</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#about">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#courses">Курсы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#enroll">Записаться</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/signin">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/signup">Вход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <section class="hero">
            <div class="card text-bg-dark">
                <img src="storage\image\kurse.jpeg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h1 class="bg-dark p-1 opacity-75">Онлайн курсы - это круто!</h1>

                </div>
            </div>
        </section>

        <section id="about">

            <div class="container">
                <h1>О нас</h1>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="courses">
            <div class="container">
                <h1>Наши курсы</h1>

                <div class="d-flex" style="gap: 20px">
                    @foreach ($courses as $item)
                        <div class="card" style="width: 18rem;">
                            <img src="storage\image\{{ $item->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <p class="card-text">{{ $item->cost }} рублей.</p>
                                <p class="card-text">Длительность: {{ $item->duration }} дней.</p>
                                <a href="#" class="btn btn-primary">Просмотреть</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $courses->withQueryString()->links('pagination::bootstrap-5') }}


            </div>
        </section>

        <section id="enroll">
            <div class="container">
                <h1>Оставить заявку</h1>
                <form method="POST" action="/enroll">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Ваш email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше имя</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Выберите курс</label>
                        <label for="" class="form-label">Выберите курс</label>
                        <select class="form-select" name="course">
                            <option disabled selected>...</option>
                            @foreach ($courses as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Оставить заявку</button>
                </form>
            </div>

        </section>

        <section>

        <div class="container asdasd">
            @foreach ($categories as $category)
                <a href="course/{{$category->id}}">{{$category->title}}</a>
            @endforeach
        </div>
        </section>
    </main>
</body>

</html>
