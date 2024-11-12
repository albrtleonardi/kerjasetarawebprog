<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container my-4">
    <h2>Edit Profile</h2>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="PhoneNumber" class="form-control" value="{{ old('PhoneNumber', $profile->PhoneNumber ?? '') }}">
        </div>

        <div class="form-group">
            <label>Country</label>
            <input type="text" name="Country" class="form-control" value="{{ old('Country', $profile->Country ?? '') }}">
        </div>

        <div class="form-group">
            <label>Province</label>
            <input type="text" name="Province" class="form-control" value="{{ old('Province', $profile->Province ?? '') }}">
        </div>

        <div class="form-group">
            <label>City</label>
            <input type="text" name="City" class="form-control" value="{{ old('City', $profile->City ?? '') }}">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="Address" class="form-control" value="{{ old('Address', $profile->Address ?? '') }}">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <input type="text" name="Gender" class="form-control" value="{{ old('Gender', $profile->Gender ?? '') }}">
        </div>

        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="DOB" class="form-control" value="{{ old('DOB', $profile->DOB ?? '') }}">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="Description" class="form-control">{{ old('Description', $profile->Description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label>Skills</label>
            <input type="text" name="SkillName" class="form-control" value="{{ old('SkillName', $profile->SkillName ?? '') }}">
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</div>

</body>
</html>
