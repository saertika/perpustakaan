<!DOCTYPE html>

<html>

<head>

    <title>Manajemen Book</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Bootstrap 5 CDN -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>





</nav>

@if(Request::is('books'))

<div style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset("img_buku/hero.jpg") }}'); 

            height: 300px;

            background-size: cover;

            background-position: center;

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            margin-bottom: 30px;">

    <div class="text-center">

        <h1 class="display-4 fw-bold">Library System</h1>

        <p class="lead">Cari dan Temukan Koleksi Buku Favoritmu</p>

    </div>

</div>

@endif

<nav>

    <a href="{{ route('books.index') }}">Data Buku</a> |

    <a href="{{ route('categories.index') }}">Data Kategori</a>

</nav>





<main class="container">

    @yield('content')

</main>







</body>

</html>