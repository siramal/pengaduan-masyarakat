@extends('layouts.app')

@section('content')
    
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f47920;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .form-select {
            border-radius: 0.375rem;
            border-color: #f47920;
        }

        .form-label {
            font-weight: bold;
            color: #f47920;
        }

        .btn-custom {
            background-color: #f47920;
            color: white;
            border-radius: 0.375rem;
            padding: 10px 20px;
            font-size: 1rem;
        }

        .btn-custom:hover {
            background-color: #f47920;
            color: white;
        }

        .section-title {
            color: #f47920;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
            background-color: white;
        }

        .custom-file-input {
            border-radius: 0.375rem;
            border-color: #f47920;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="section-title">Complaint Submission</h2>
                <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label" for="province">Select a Province</label>
                            <select class="form-select" name="province_id" id="province" aria-label="Province select"
                                onchange="handleChangeProvince(this.value)">
                                <option value="">Select a Province</option>
                                @foreach ($dataProvince as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label" for="kabupaten">Select a Kabupaten/Kota</label>
                            <select class="form-select" id="kabupaten" name="kabupaten_id" aria-label="Kabupaten/Kota select" disabled
                                onchange="handleChangeKabupaten(this.value)">
                                <option value="">Select a Kabupaten/Kota</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label" for="kecamatan">Select a Kecamatan</label>
                            <select class="form-select" id="kecamatan" name="kecamatan_id" aria-label="Kecamatan select" disabled
                                onchange="handleChangeKecamatan(this.value)">
                                <option value="">Select a Kecamatan</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label" for="desa">Select a Desa</label>
                            <select class="form-select" id="desa" name="desa_id" aria-label="Desa select" disabled>
                            <option value="">Select a Desa</option>
                        </select>
                        
                        </div>

                        <!-- Complaint Type and Details -->
                        <div class="col-12 mt-4">
                            <label class="form-label" for="keluhan-type">Complaint Type</label>
                            <select class="form-select" id="keluhan-type" name="report_type" aria-label="Complaint Type">
                                <option value="">Select a Complaint Type</option>
                                <option value="Kejahatan">Kejahatan</option>
                                <option value="Sosial">Sosial</option>
                                <option value="Pembangunan">Pembangunan</option>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label" for="keluhan-detail">Complaint Details</label>
                            <textarea class="form-control" name="report_detail" id="keluhan-detail" rows="4" placeholder="Describe your complaint in detail..."></textarea>
                        </div>

                        <!-- Image Upload -->
                        <div class="col-12 mt-3">
                            <label class="form-label" for="image-upload">Supporting Image (Optional)</label>
                            <input class="form-control" type="file" name="image_path" id="image-upload">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>





                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const handleChangeProvince = (value) => {
            // document.getElementById('province-hidden').value = value;
            getDataRegencies(value);
            clearKabupaten();
            clearKecamatan();
            clearDesa();
        }

        const handleChangeKabupaten = (idKabupaten) => {
            // document.getElementById('kabupaten-hidden').value = idKabupaten;
            getDistrict(idKabupaten);
            clearKecamatan();
            clearDesa();
        }

        const handleChangeKecamatan = (value) => {
            // document.getElementById('kecamatan-hidden').value = value;
            getVillage(value);
            clearDesa();
        }



        const getDataRegencies = async (idProv) => {
            const kabupaten = await fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${idProv}.json`).then((
                response) => {
                const regencies = response.json();
                return regencies;
            })
            const kabupatenSelect = document.getElementById("kabupaten");
            kabupatenSelect.innerHTML = '<option value="">Select a Kabupaten/Kota</option>';

            kabupaten.forEach((regency) => {
                const option = document.createElement("option");
                option.value = regency.id;
                option.textContent = regency.name;
                kabupatenSelect.appendChild(option);
            });
            const selectElement = document.getElementById('kabupaten');
            selectElement.removeAttribute('disabled');
        }

        const getDistrict = (idKabupaten) => {
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${idKabupaten}.json`).then(async (
                response) => {
                const regencies = await response.json();
                const kabupatenSelect = document.getElementById("kecamatan");
                kabupatenSelect.innerHTML = '<option value="">Select a kecamatan</option>';

                regencies.forEach((regency) => {
                    const option = document.createElement("option");
                    option.value = regency.id;
                    option.textContent = regency.name;
                    kabupatenSelect.appendChild(option);
                });
                const selectElement = document.getElementById('kecamatan');
                selectElement.removeAttribute('disabled');
            })
        }

        const getVillage = (idDistrict) => {
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${idDistrict}.json`).then(async (
                response) => {
                const regencies = await response.json();
                const kabupatenSelect = document.getElementById("desa");
                kabupatenSelect.innerHTML = '<option value="">Select a desa</option>';

                regencies.forEach((regency) => {
                    const option = document.createElement("option");
                    option.value = regency.id;
                    option.textContent = regency.name;
                    kabupatenSelect.appendChild(option);
                });
                const selectElement = document.getElementById('desa');
                selectElement.removeAttribute('disabled');
            })
        }

        const clearKabupaten = () => {
            const kabupatenSelect = document.getElementById("kabupaten");
            kabupatenSelect.innerHTML = '<option value="">Select a Kabupaten/Kota</option>';
            kabupatenSelect.setAttribute('disabled', 'disabled');
        }

        const clearKecamatan = () => {
            const kabupatenSelect = document.getElementById("kecamatan");
            kabupatenSelect.innerHTML = '<option value="">Select a kecamatan</option>';
            kabupatenSelect.setAttribute('disabled', 'disabled');
        }

        const clearDesa = () => {
            const kabupatenSelect = document.getElementById("desa");
            kabupatenSelect.innerHTML = '<option value="">Select a desa</option>';
            kabupatenSelect.setAttribute('disabled', 'disabled');
        }
    </script>
</body>

</html>
@endsection
