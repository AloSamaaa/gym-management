<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5 m-5">
        <h1 class="fw-bold">Member Info</h1>
        <p>Edit Member info.</p>
        <a href="{{ route('welcome') }}" class="btn btn-light btn-sm">← Go back</a>
        <div class="card py-5 px-4 mt-3 col-md-6">
            <form method="POST" action="{{ route('update') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="membership_expiration" class="form-label">Membership Expiration</label>
                    <input type="date" class="form-control" id="membership_expiration" name="membership_expiration" value="{{ $member->membership_expiration }}" required>
                </div>
                <div class="mb-3">
                    @if($member->membership_id != 1)
                    <label for="membership_id">Current Membership:</label>
                                <select name="membership_id" id="membership_id">
                                    <option value="2"> {{ $member->membership->membership_type }} </option>
                                    <option value="1"> VIP </option>
                                </select>
                    @else
                    <label for="membership_id">Current Membership:</label>
                                <select name="membership_id" id="membership_id">
                                    <option value="1"> {{ $member->membership->membership_type }} </option>
                                    <option value="2"> Normal </option>
                                </select>
                    @endif
                </div>
                <div class="mb-3">
                    @if($member->trainer_id != 1)
                    <label for="trainer_id">Choose a Trainer:</label>
                                <select name="trainer_id" id="trainer_id">
                                    <option value="2"> {{ $member->trainer->name }} </option>
                                    <option value="1"> Coach Bryl </option>
                                </select>
                    @else
                    <label for="trainer_id">Choose a Trainer:</label>
                                <select name="trainer_id" id="trainer_id">
                                    <option value="1"> {{ $member->trainer->name }} </option>
                                    <option value="2"> Coach Mavs </option>
                                </select>             
                    @endif


                    <input type="hidden" name="id" value="{{ $member->id }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</body>

</html>