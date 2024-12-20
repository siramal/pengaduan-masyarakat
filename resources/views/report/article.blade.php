@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Artikel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .no-underline {
                text-decoration: none;
            }

            body {

                background-color: #f47920;
                color: black;
            }

            .card {
                margin: 10px 0;
            }
            .info-box {
                background-color: white;
                border: 1px solid #ddd;
                padding: 20px;
                border-radius: 5px;
                margin-top: 20px;
            }
        </style>
    </head>

    <body>
        <div class="container py-4">
            <div class="row">
                <!-- Bagian Artikel -->
                <div class="col-md-8">
                    <div class="col-12">
                        <select class="form-select" name="province_id" id="province" aria-label="Province select"
                            onchange="handleFilterProvince(this.value)">
                            <option value="">Select a Province</option>
                            @foreach ($dataProvince as $item)
                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($articles as $article)
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $article->image_path) }}"
                                        alt="{{ $article->image_path }}" class="img-fluid rounded-start"
                                        alt="Gambar Artikel">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="{{ route('report.show', ['id' => $article->id]) }}" class="no-underline">
                                            <h5 class="card-title nav-link">{{ $article->report_detail }}</h5>
                                        </a>
                                        <p class="card-text">
                                            <small class="text-muted">{{ $article->user_id }} -
                                                {{ $article->created_at }}</small>
                                        </p>
                                        <div>
                                            <span>👁️ {{ $article->views }}</span>
                                            <span>❤️ {{ $article->likes }}</span>
                                            {{-- waktu --}}
                                            <div class="text-gray-500 text-sm mt-2">
                                                {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if (count($articles) == 0)
                        <h2 class="text-center">data not found</h2>
                    @endif


                </div>

                <!-- Bagian Informasi -->
                <div class="col-md-4">
                    <div class="info-box">
                        <h5>ℹ️ Informasi Pembuatan Pengaduan</h5>
                        <ol>
                            <li>Pengaduan bisa dibuat hanya jika Anda telah membuat akun sebelumnya.</li>
                            <li>Keseluruhan data pada pengaduan bernilai <strong>BENAR dan DAPAT DIPERTANGGUNG
                                    JAWABKAN</strong>.</li>
                            <li>Seluruh bagian data perlu diisi.</li>
                            <li>Pengaduan Anda akan ditanggapi dalam 2x24 Jam.</li>
                            <li>Periksa tanggapan Kami, pada <strong>Dashboard</strong> setelah Anda <strong>Login</strong>.
                            </li>
                            <li>Pembuatan pengaduan dapat dilakukan pada halaman berikut: <a
                                    href="{{ route('report.create') }}">Ikuti Tautan</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <script>
            const handleFilterProvince = (provinceId) => {
                if (provinceId) {
                    window.location.href = `?province_id=${provinceId}`;
                }
            }
        </script>
    </body>

    </html>
@endsection
