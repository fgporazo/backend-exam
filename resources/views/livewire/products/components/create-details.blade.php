<!-- Modal -->
<div wire:ignore class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <form wire:submit.prevent="store">
        
      <div class="modal-body">
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input wire:model="image" type="file" class="form-control" id="image" />
                @error('image') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3" >
                <label for="name" class="form-label">Product Name</label>
                <input wire:model.defer="name" type="text" class="form-control" id="name" placeholder="">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="product_category_id" class="form-label">Product Category</label>
                <select class="form-control form-control-sm" wire:model.defer="product_category_id">
                <option>Choose</option>
                @forelse($categories as $cat)
                <option value="{{$cat->id}}">{{ucwords($cat->name)}}</option>
                @empty
                @endforelse
            </select>
                @error('product_category_id') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <textarea wire:model.defer="description" cols="3" class="form-control" id="description" placeholder=""></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>