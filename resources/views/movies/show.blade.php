<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie['Title'] }} - Catflix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F9DFDF;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar { background-color: rgba(0,0,0,0.9) !important; }

        .detail-wrapper {
            max-width: 100%;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            align-items: stretch;
        }

        .poster-box {
            flex: 0 0 300px;
            background-color: #ffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 0 30px 30px;
        }

        .poster-box img {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: contain;
        }

        .info-box {
            padding: 30px 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .rating-tag {
            background: #f1c40f;
            color: #000;
            padding: 4px 10px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 0.85rem;
        }

        .movie-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin: 10px 0;
            color: #111;
            line-height: 1.2;
        }

        .movie-meta {
            color: #666;
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        .synopsis-label {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: #999;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .plot-text {
            line-height: 1.6;
            margin-bottom: 25px;
            color: #444;
            font-size: 1rem;
            text-align: justify;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .detail-item label {
            display: block;
            font-size: 0.7rem;
            color: #aaa;
            text-transform: uppercase;
            font-weight: bold;
        }

        .detail-item span {
            font-size: 0.9rem;
            color: #222;
            font-weight: 500;
        }

        .btn-back {
            display: inline-block;
            margin-top: 30px;
            padding: 8px 20px;
            background: #222;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 0.85rem;
            transition: 0.3s;
            width: fit-content;
        }
        .btn-back:hover { background: #000; color: #fff; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark sticky-top mb-2 shadow">
    <div class="container">
        <a class="navbar-brand text-danger fw-bold fs-3" href="{{ route('movies.index') }}">CATFLIX</a>
    </div>
</nav>

<div class="container">
    <div class="detail-wrapper">
        <div class="poster-box">
            <img src="{{ $movie['Poster'] !== 'N/A' ? $movie['Poster'] : 'https://via.placeholder.com/300x450?text=No+Poster' }}" alt="Poster">
        </div>

        <div class="info-box">
            <div>
                <span class="rating-tag">⭐ {{ $movie['imdbRating'] }}</span>
                <span class="ms-2 fw-bold text-muted">{{ $movie['Year'] }}</span>
            </div>

            <h1 class="movie-title">{{ $movie['Title'] }}</h1>
            <p class="movie-meta">{{ $movie['Genre'] }} | {{ $movie['Runtime'] }}</p>

            <hr class="my-3">

            <span class="synopsis-label">Sinopsis</span>
            <p class="plot-text">{{ $movie['Plot'] }}</p>

            <div class="detail-grid">
                <div class="detail-item">
                    <label>Sutradara</label>
                    <span>{{ $movie['Director'] }}</span>
                </div>
                <div class="detail-item">
                    <label>Pemeran</label>
                    <span>{{ $movie['Actors'] }}</span>
                </div>
                <div class="detail-item">
                    <label>Penulis</label>
                    <span>{{ $movie['Writer'] }}</span>
                </div>
                <div class="detail-item">
                    <label>Penghargaan</label>
                    <span>{{ $movie['Awards'] }}</span>
                </div>
            </div>

            <a href="{{ route('movies.index') }}" class="btn-back">Kembali ke Katalog</a>
        </div>
    </div>
</div>

</body>
</html>
