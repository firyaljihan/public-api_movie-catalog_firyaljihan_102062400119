<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F9DFDF;
            color: black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: rgba(0,0,0,0.9) !important;
        }
        .movie-row {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 20px;
            gap: 15px; }
        .movie-row::-webkit-scrollbar {
            display: none;
        }
        .card {
            background-color: white;
            border: none;
            min-width: 200px;
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 8px;
            overflow: hidden;
        }
        .card:hover {
            transform: scale(1.08);
            z-index: 10;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .card img {
            height: 300px;
            object-fit: cover;
            width: 100%;
        }
        .card-body {
            padding: 10px;
        }
        .card-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 0;
            color: black;
            display: block;
        }
        .text-decoration-none, .text-decoration-none:hover {
            text-decoration: none !important;
            color: inherit;
        }
        .form-control::placeholder {
            color: #adb5bd !important;
            opacity: 1;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark sticky-top mb-4 shadow">
    <div class="container">
        <a class="navbar-brand text-danger fw-bold fs-3" href="{{ route('movies.index') }}">CATFLIX</a>
        <form action="{{ route('movies.index') }}" method="GET" class="d-flex w-50">
            <input type="text" name="search" class="form-control bg-dark text-white border-secondary"
                   placeholder="Search your favorite movies..." value="{{ $search ?? '' }}">
            <button class="btn btn-outline-danger ms-2" type="submit">Cari</button>
        </form>
    </div>
</nav>

<div class="container-fluid px-5">
    @if($search)
        <div class="row">
            @forelse($searchResults as $movie)
                <div class="col-md-2 mb-4">
                    <a href="{{ route('movies.show', $movie['imdbID']) }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : 'https://via.placeholder.com/300x450?text=No+Image' }}" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title text-truncate">{{ $movie['Title'] }}</h6>
                                <small class="text-muted">{{ $movie['Year'] }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p class="alert alert-dark text-white">Film "{{ $search }}" tidak ditemukan.</p>
                </div>
            @endforelse
        </div>
    @else
        <h4 class="mb-3 fw-bold">🔥 Action Movies</h4>
        <div class="movie-row mb-5">
            @foreach($actionMovies as $movie)
                <div class="card shadow-sm">
                    <a href="{{ route('movies.show', $movie['imdbID']) }}" class="text-decoration-none">
                        <img src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : 'https://via.placeholder.com/300x450' }}" alt="Poster">
                        <div class="card-body">
                            <h6 class="card-title text-truncate">{{ $movie['Title'] }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h4 class="mb-3 fw-bold">👻 Spooky Horror</h4>
        <div class="movie-row mb-5">
            @foreach($horrorMovies as $movie)
                <div class="card shadow-sm">
                    <a href="{{ route('movies.show', $movie['imdbID']) }}" class="text-decoration-none">
                        <img src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : 'https://via.placeholder.com/300x450' }}" alt="Poster">
                        <div class="card-body">
                            <h6 class="card-title text-truncate">{{ $movie['Title'] }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <h4 class="mb-3 fw-bold">⛩️ Top Anime</h4>
        <div class="movie-row mb-5">
            @foreach($animeMovies as $movie)
                <div class="card shadow-sm">
                    <a href="{{ route('movies.show', $movie['imdbID']) }}" class="text-decoration-none">
                        <img src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : 'https://via.placeholder.com/300x450' }}" alt="Poster">
                        <div class="card-body">
                            <h6 class="card-title text-truncate">{{ $movie['Title'] }}</h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>

<footer class="py-4 mt-5 text-center text-dark opacity-75 border-top border-dark">
    <p>&copy; 2026 - Catflix by Firyal Jihan Haura</p>
</footer>

</body>
</html>
