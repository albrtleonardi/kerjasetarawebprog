<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container my-4">
    <h2>Your Profile</h2>
    <p><strong>Phone Number:</strong> {{ $profile->PhoneNumber ?? 'Not provided' }}</p>
    <p><strong>Country:</strong> {{ $profile->Country ?? 'Not provided' }}</p>
    <p><strong>Province:</strong> {{ $profile->Province ?? 'Not provided' }}</p>
    <p><strong>City:</strong> {{ $profile->City ?? 'Not provided' }}</p>
    <p><strong>Address:</strong> {{ $profile->Address ?? 'Not provided' }}</p>
    <p><strong>Gender:</strong> {{ $profile->Gender ?? 'Not provided' }}</p>
    <p><strong>Date of Birth:</strong> {{ $profile->DOB ?? 'Not provided' }}</p>
    <p><strong>Description:</strong> {{ $profile->Description ?? 'Not provided' }}</p>
    <p><strong>Skills:</strong> {{ $profile->SkillName ?? 'Not provided' }}</p>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
</div>

</body>
</html>
