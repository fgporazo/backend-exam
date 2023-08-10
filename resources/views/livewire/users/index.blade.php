<div>
    <!-- Button trigger modal -->
    <div class="card-tools">
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserDetails">
                Add User
                </button>
            </div>
        </div>
    </div>
    <br>
    <x-commons.alert></x-commons.alert>
    <table id="example" class="table table-striped table-bordered" style="width:100%" >
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <!-- <th>Password</th>        -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $key => $user)
                <tr wire:click="updateDetails('{{$user->id}}')" role="button">
                    <td>{{ $key + $users->firstItem() }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->middle_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><button data-id="{{ $user->id }}" type="button" class="btn btn-outline-danger remove-data">Delete</button></td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="card-footer">
        {{ $users->links() }}
    </div>
    @include('livewire.users.components.create-details')
    @include('livewire.users.components.update-details')
</div>
@push('scripts')
   <script>
    window.livewire.on('store', () => {
        $('#addUserDetails').modal('show');
    });
    $('tr').on('click', function(e){
            if(e.target.tagName == 'TD'){
                window.livewire.on('updateDetails', () => {
                    $('#updateUserDetails').modal('show');
                });
            }
    });
    </script>
@endpush