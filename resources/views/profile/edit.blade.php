<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Biodata Diri</title>
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
        .profile-summary {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #e9ecef;
        }

        .profile-summary img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 2px solid var(--light-blue);
            object-fit: cover;
            margin-bottom: 15px;
        }

        .profile-summary .info {
            flex: 1;
        }

        .profile-summary .info h3 {
            margin: 10px 0 5px;
            font-size: 1.5rem;
            color: var(--primary-blue);
        }

        .profile-summary .info p {
            margin: 0;
            font-size: 1rem;
            color: #6c757d;
        }

        .profile-summary {
    display: flex;
    flex-direction: column; /* Stack items vertically */
    align-items: center; /* Center items horizontally */
    justify-content: center; /* Center items vertically */
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 20px;
    margin: 20px auto; /* Center the section horizontally */
    border: 1px solid #e9ecef;
    max-width: 600px; /* Set a max-width for consistent centering */
}

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

        .text-center {
            text-align: center;
        }

        .profile-instructions {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">← Back to Home</a>
    </div>

    <!-- Profile Summary Section -->
    <div class="container profile-summary">
        <img src="{{ asset('storage/profilephoto/' . ($user->profile_photo ?? 'default.jpg')) }}" alt="Profile Picture">
        <div class="info">
            <h3>{{ old('UserName', $user->UserName ?? 'User Name') }}</h3>
            <p>{{ old('Email', $user->Email ?? 'Email') }}</p>
        </div>
    </div>

    <div class="container">
        <h2>Edit Biodata Diri</h2>

        <!-- Display success message if exists -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Picture Section -->
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="profile-picture">
                        <!-- Preview of new profile picture -->
                        <img id="previewImage" src="{{ asset('storage/profilephoto/' . ($user->profile_photo ?? 'default.jpg')) }}" alt="Foto Formal">
                    </div>
                    <p class="profile-instructions">Gunakan foto formal!</p>
                    <div class="mb-3">
                        <label for="Photo" class="form-label">Unggah Foto</label>
                        <input type="file" name="Photo" class="form-control" id="Photo" accept="image/*">
                    </div>
                </div>

                <div class="col-md-9">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="UserName" class="form-control" id="UserName" value="{{ old('UserName', $user->UserName ?? '') }}">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="Email" class="form-control" id="Email" value="{{ old('Email', $user->Email ?? '') }}">
                        <a href="#" class="text-primary">Ganti email?</a>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Hp</label>
                        <input type="text" name="PhoneNumber" class="form-control" id="PhoneNumber" value="{{ old('PhoneNumber', $user->PhoneNumber ?? '') }}">
                        <a href="#" class="text-primary">Ganti Nomor HP?</a>
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="mb-3">
                <label for="address" class="form-label">Alamat Lengkap</label>
                <textarea name="Address" class="form-control" id="Address" rows="3">{{ old('Address', $user->Address ?? '') }}</textarea>
            </div>

            <!-- Country, Province, and City Section -->
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="country" class="form-label">Negara</label>
                        <select name="Country" class="form-control" id="Country">
                            <option value="">Pilih Negara</option>
                            <option value="Indonesia" {{ old('Country', $user->Country ?? '') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                            <option value="Malaysia" {{ old('Country', $user->Country ?? '') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                            <option value="Singapura" {{ old('Country', $user->Country ?? '') == 'Singapura' ? 'selected' : '' }}>Singapura</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="province" class="form-label">Provinsi</label>
                        <select name="Province" class="form-control" id="Province">
                            <option value="">Pilih Provinsi</option>
                            <option value="Aceh" {{ old('Province', $user->Province ?? '') == 'Aceh' ? 'selected' : '' }}>Aceh</option>
                            <option value="Sumatera Utara" {{ old('Province', $user->Province ?? '') == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                            <option value="Sumatera Barat" {{ old('Province', $user->Province ?? '') == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                            <option value="Riau" {{ old('Province', $user->Province ?? '') == 'Riau' ? 'selected' : '' }}>Riau</option>
                            <option value="Jambi" {{ old('Province', $user->Province ?? '') == 'Jambi' ? 'selected' : '' }}>Jambi</option>
                            <option value="Sumatera Selatan" {{ old('Province', $user->Province ?? '') == 'Sumatera Selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
                            <option value="Bengkulu" {{ old('Province', $user->Province ?? '') == 'Bengkulu' ? 'selected' : '' }}>Bengkulu</option>
                            <option value="Lampung" {{ old('Province', $user->Province ?? '') == 'Lampung' ? 'selected' : '' }}>Lampung</option>
                            <option value="Kepulauan Bangka Belitung" {{ old('Province', $user->Province ?? '') == 'Kepulauan Bangka Belitung' ? 'selected' : '' }}>Kepulauan Bangka Belitung</option>
                            <option value="Kepulauan Riau" {{ old('Province', $user->Province ?? '') == 'Kepulauan Riau' ? 'selected' : '' }}>Kepulauan Riau</option>
                            <option value="DKI Jakarta" {{ old('Province', $user->Province ?? '') == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                            <option value="Jawa Barat" {{ old('Province', $user->Province ?? '') == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                            <option value="Jawa Tengah" {{ old('Province', $user->Province ?? '') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                            <option value="DI Yogyakarta" {{ old('Province', $user->Province ?? '') == 'DI Yogyakarta' ? 'selected' : '' }}>DI Yogyakarta</option>
                            <option value="Jawa Timur" {{ old('Province', $user->Province ?? '') == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                            <option value="Banten" {{ old('Province', $user->Province ?? '') == 'Banten' ? 'selected' : '' }}>Banten</option>
                            <option value="Bali" {{ old('Province', $user->Province ?? '') == 'Bali' ? 'selected' : '' }}>Bali</option>
                            <option value="Nusa Tenggara Barat" {{ old('Province', $user->Province ?? '') == 'Nusa Tenggara Barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur" {{ old('Province', $user->Province ?? '') == 'Nusa Tenggara Timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                            <option value="Kalimantan Barat" {{ old('Province', $user->Province ?? '') == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                            <option value="Kalimantan Tengah" {{ old('Province', $user->Province ?? '') == 'Kalimantan Tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
                            <option value="Kalimantan Selatan" {{ old('Province', $user->Province ?? '') == 'Kalimantan Selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
                            <option value="Kalimantan Timur" {{ old('Province', $user->Province ?? '') == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                            <option value="Kalimantan Utara" {{ old('Province', $user->Province ?? '') == 'Kalimantan Utara' ? 'selected' : '' }}>Kalimantan Utara</option>
                            <option value="Sulawesi Utara" {{ old('Province', $user->Province ?? '') == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
                            <option value="Sulawesi Tengah" {{ old('Province', $user->Province ?? '') == 'Sulawesi Tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
                            <option value="Sulawesi Selatan" {{ old('Province', $user->Province ?? '') == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                            <option value="Sulawesi Tenggara" {{ old('Province', $user->Province ?? '') == 'Sulawesi Tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
                            <option value="Gorontalo" {{ old('Province', $user->Province ?? '') == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                            <option value="Sulawesi Barat" {{ old('Province', $user->Province ?? '') == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                            <option value="Maluku" {{ old('Province', $user->Province ?? '') == 'Maluku' ? 'selected' : '' }}>Maluku</option>
                            <option value="Maluku Utara" {{ old('Province', $user->Province ?? '') == 'Maluku Utara' ? 'selected' : '' }}>Maluku Utara</option>
                            <option value="Papua" {{ old('Province', $user->Province ?? '') == 'Papua' ? 'selected' : '' }}>Papua</option>
                            <option value="Papua Barat" {{ old('Province', $user->Province ?? '') == 'Papua Barat' ? 'selected' : '' }}>Papua Barat</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" name="City" class="form-control" id="City" placeholder="Masukkan Kota" value="{{ old('City', $user->City ?? '') }}">
                    </div>
                </div>
            </div>

            <!-- Birthdate and Gender Section -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="dob" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="DOB" class="form-control" id="DOB" value="{{ old('DOB', $user->DOB ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="Gender" class="form-control" id="Gender">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('Gender', $user->Gender ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('Gender', $user->Gender ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="Description" class="form-label">Deskripsi Diri</label>
                <input type="text" name="Description" class="form-control" id="Description" value="{{ old('Description', $user->Description ?? '') }}">            </div>

            <div class="mb-3">
                <label for="SkillName" class="form-label">Keahlian</label>
                <input type="text" name="SkillName" class="form-control" id="SkillName" value="{{ old('SkillName', $user->SkillName ?? '') }}">
            </div>

            <!-- Save Button -->
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
            
        </form>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('Photo').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

    </script>

</body>

</html>
