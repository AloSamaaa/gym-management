<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>GMMS</title>
</head>
<body>
    <div class="container m-5 p-5">
        <div class="row">
            <h1><strong>Gym Membership Management</strong></h1>
            <hr>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <table class="table border table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Trainer</th>
                        <th>Membership Type</th>
                        <th>Membership Expiration</th>
                        <th>Date Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach($members as $member)   
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->trainer->name }}</td>
                            <td>{{ $member->membership->membership_type}}</td>
                            <td>{{ $member->membership_expiration }}</td>
                            <td>{{ $member->created_at }}</td>
                            <td>                            
                                <a href="{{ route('editmember', $member->id )}}}" class="btn rounded-pill btn-primary btn-sm">📝</a>
                                    
                                <a href="{{ route('deletemember', $member->id) }}" class="btn rounded-pill btn-light btn-sm">❌</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <button type="button" data-bs-toggle="modal" data-bs-target="#newTodoModal" class="btn btn-primary btn-sm">New Member</button>
           
            <!-- New Todo Modal -->
            <div class="modal fade" id="newTodoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Create a New Member</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/newmember">
                    @csrf
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">

                                <label for="membership_expiration">Membership Expiration</label>
                                <input type="date" class="form-control" id="membership_expiration" name="membership_expiration" required>
                                <br>
                                <br>    

                                <label for="trainer_id">Choose a Trainer:</label>
                                <select name="trainer_id" id="trainer_id">
                                    <option value="1"> Coach Bryl </option>
                                    <option value="2"> Coach Mavs </option>
                                </select>

                                <br>
                                <br>

                                <label for="membership_id">Membership:</label>
                                <select name="membership_id" id="membership_id">
                                    <option value="1"> VIP - $6000 </option>
                                    <option value="2"> Normal - $1000 </option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>