<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Diri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        /* Custom color variables */
        :root {
            --primary-blue: #3b7bdf;
            --light-blue: #e6f2ff;
            --soft-gray: #f8f9fa;
        }

        body {
            background-color: var(--soft-gray);
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-top: 30px;
            border: 1px solid #e9ecef;
        }

        h2 {
            color: var(--primary-blue);
            border-bottom: 2px solid var(--primary-blue);
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* Profile picture frame styling */
        .profile-picture {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 3px solid var(--light-blue);
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0 auto;
            box-shadow: 0 4px 6px rgba(59, 123, 223, 0.1);
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-instructions {
            text-align: center;
            font-size: 14px;
            color: var(--primary-blue);
            margin-top: 10px;
        }

        .form-label {
            color: var(--primary-blue);
            font-weight: 500;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(59, 123, 223, 0.25);
        }

        .btn-success {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #2a65c4;
            border-color: #2a65c4;
        }

        .text-primary {
            color: var(--primary-blue) !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Biodata Diri</h2>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Picture Section -->
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="profile-picture">
                        <img id="previewImage" src="#" alt="Foto Formal" style="display: none;">
                    </div>
                    <p class="profile-instructions">Gunakan Foto Formal. Buat HR Anda terkesan!</p>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Unggah Foto</label>
                        <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap*</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $profile->name ?? '') }}">
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $profile->email ?? '') }}">
                        <a href="#" class="text-primary">Ganti email?</a>
                    </div>
                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Hp*</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $profile->phone ?? '') }}">
                        <a href="#" class="text-primary">Ganti Nomor HP?</a>
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="mb-3">
                <label for="address" class="form-label">Alamat Lengkap</label>
                <textarea name="address" class="form-control" id="address" rows="3">{{ old('address', $profile->address ?? '') }}</textarea>
            </div>

            <!-- Country, Province, and City Section -->
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="country" class="form-label">Negara*</label>
                        <select name="country" class="form-control" id="country">
                            <option value="">Pilih Negara</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Singapura">Singapura</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="province" class="form-label">Provinsi*</label>
                        <select name="province" class="form-control" id="province">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota*</label>
                        <select name="city" class="form-control" id="city">
                            <option value="">Pilih Kota</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Birthdate and Gender Section -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="dob" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob', $profile->dob ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-control" id="gender">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="pria" {{ old('gender', $profile->gender ?? '') == 'pria' ? 'selected' : '' }}>Pria</option>
                            <option value="wanita" {{ old('gender', $profile->gender ?? '') == 'wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Profile Summary and Skills -->
            <div class="mb-3">
                <label for="description" class="form-label">Ringkasan Profil</label>
                <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $profile->description ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <input type="text" name="skills" class="form-control" id="skills" value="{{ old('skills', $profile->skills ?? '') }}">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Script to Populate Province and City -->
    <script>
        const provincesAndCities = {
            "Jawa Barat": ["Bandung", "Bekasi", "Bogor", "Cimahi"],
            "Jawa Tengah": ["Semarang", "Solo", "Magelang", "Tegal"],
            "Jawa Timur": ["Surabaya", "Malang", "Kediri", "Blitar"],
            "DKI Jakarta": ["Jakarta Selatan", "Jakarta Barat", "Jakarta Utara", "Jakarta Timur"]
        };

        document.addEventListener("DOMContentLoaded", () => {
            const provinceSelect = document.getElementById("province");
            const citySelect = document.getElementById("city");

            // Fill provinces dropdown
            for (const province in provincesAndCities) {
                const option = document.createElement("option");
                option.value = province;
                option.textContent = province;
                provinceSelect.appendChild(option);
            }

            // Update city dropdown based on selected province
            provinceSelect.addEventListener("change", () => {
                const selectedProvince = provinceSelect.value;
                citySelect.innerHTML = '<option value="">Pilih Kota</option>';

                if (selectedProvince && provincesAndCities[selectedProvince]) {
                    provincesAndCities[selectedProvince].forEach(city => {
                        const option = document.createElement("option");
                        option.value = city;
                        option.textContent = city;
                        citySelect.appendChild(option);
                    });
                }
            });
        });

        // Profile picture preview
        document.getElementById("photo").addEventListener("change", function (event) {
            const file = event.target.files[0];
            const previewImage = document.getElementById("previewImage");

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = "none";
                previewImage.src = "#";
            }
        });
    </script>
</body>
</html>