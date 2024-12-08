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
                        <label for="photo" class="form-label">Unggah Foto</label>
                        <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
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
                        <select name="Province" class="form-control" id="province">
                            <option value="">Pilih Provinsi</option>
                            <!-- Add more provinces dynamically if needed -->
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

            <!-- Save Button -->
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
            
        </form>

        <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('photo').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('previewImage').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>

</body>

</html>
