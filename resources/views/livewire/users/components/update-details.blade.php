<!-- Modal -->
<div class="modal fade" id="updateUserDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update User Details : {{$first_name}} {{$last_name}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <form wire:submit.prevent="update">
        
        <div class="modal-body">
              <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input wire:model.defer="username" type="text" class="form-control" id="username" placeholder="">
                  @error('username') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="mb-3">
                  <label for="first_name" class="form-label">First Name</label>
                  <input wire:model.defer="first_name" type="text" class="form-control" id="first_name" placeholder="">
                  @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="mb-3">
                  <label for="middle_name" class="form-label">Middle Name</label>
                  <input wire:model.defer="middle_name" type="text" class="form-control" id="middle_name" placeholder="">
                  @error('middle_name') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="mb-3">
                  <label for="last_name" class="form-label">Last Name</label>
                  <input wire:model.defer="last_name" type="text" class="form-control" id="last_name" placeholder="">
                  @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email address</label>
                  <input wire:model.defer="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  @error('email') <span class="text-danger">{{ $message }}</span>@enderror
              </div>
              <!-- <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input wire:model.defer="password" type="password" class="form-control" id="password" />
                  @error('password') <span class="text-danger">{{ $message }}</span>@enderror
              </div> -->
              
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>