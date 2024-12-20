@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        .card-header {
            background-color: #f8f9fa;
            color: #333;
            font-size: 18px;
            font-weight: bold;
        }
        .card-body {
            background-color: #d3d3d3;
            color: white;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
        }
        .toggle-icon {
            cursor: pointer;
            font-size: 20px;
        }
        .content-section {
            display: none;
        }
        .btn-group {
            width: 100%;
            margin-top: 10px;
        }
        .btn-group .btn {
            width: 33%;
        }
    </style>
</head>
<body>

    <div class="container my-4">
        <!-- Looping untuk setiap Pengaduan -->
        @foreach($reports as $report)
        <div class="card mb-3">
            <!-- Header -->
            <div class="card-header d-flex justify-content-between">
                <span>Pengaduan {{ \Carbon\Carbon::parse($report->created_at)->format('d F Y') }}</span>
                <i class="fas fa-chevron-down toggle-icon" onclick="toggleDetails(this)"></i> <!-- Ikon Panah -->
            </div>

            <!-- Body -->
            <div class="card-body d-none">
                <!-- Tombol Navigasi -->
                <div class="btn-group" role="group">
                    <button class="btn btn-light" onclick="showSection(this, 'data-{{ $loop->index }}')">Data</button>
                    <button class="btn btn-light" onclick="showSection(this, 'gambar-{{ $loop->index }}')">Gambar</button>
                    <button class="btn btn-light" onclick="showSection(this, 'status-{{ $loop->index }}')">Status</button>
                </div>

                <!-- Data Section -->
                <div class="content-section" id="data-{{ $loop->index }}">
                    <h5 class="card-title mt-3">Data</h5>
                    <ul>
                        <li><strong>Tipe:</strong> {{ $report->report_type }}</li>
                        <li><strong>Lokasi:</strong> {{ $report->desa_id }}, {{ $report->kecamatan_id }}, {{ $report->kabupaten_id }}, {{ $report->province_id }}</li>
                        <li><strong>Deskripsi:</strong> {{ $report->report_detail }}</li>
                    </ul>
                </div>

                <!-- Gambar Section -->
                <div class="content-section" id="gambar-{{ $loop->index }}">
                    <h5 class="card-title mt-3">Gambar</h5>
                    @if($report->image_path)
                        <img src="{{ asset('storage/'.$report->image_path) }}" class="img-fluid" alt="Gambar Pengaduan">
                    @else
                        <p>Tidak ada gambar tersedia.</p>
                    @endif
                </div>

                <!-- Status Section -->
                <div class="content-section" id="status-{{ $loop->index }}">
                    <h5 class="card-title mt-3">Status</h5>
                    <p><strong>Status:</strong> {{ $report->status }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk Menampilkan atau Menyembunyikan Card Body
        function toggleDetails(icon) {
            const cardBody = icon.closest('.card').querySelector('.card-body');
            cardBody.classList.toggle('d-none');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        }

        // Fungsi untuk Menampilkan Section yang Dipilih
        function showSection(button, sectionId) {
            const cardBody = button.closest('.card-body');

            // Sembunyikan Semua Section
            const sections = cardBody.querySelectorAll('.content-section');
            sections.forEach(section => section.style.display = 'none');

            // Tampilkan Section Berdasarkan ID
            const activeSection = cardBody.querySelector(`#${sectionId}`);
            if (activeSection) {
                activeSection.style.display = 'block';
            }
        }
    </script>

</body>
</html>

@endsection
