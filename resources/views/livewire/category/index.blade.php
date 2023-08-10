<div>
    <!-- Button trigger modal -->
    <div class="card-tools">
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                Add Category
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
                <th>Category Name</th>
                <th>Category Description</th>
                <!-- <th>Password</th>        -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($category as $key => $cat)
                <tr wire:click="updateDetails('{{$cat->id}}')" role="button">
                    <td>{{ $key + $category->firstItem() }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td><button data-id="{{ $cat->id }}" type="button" class="btn btn-outline-danger remove-data">Delete</button></td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="card-footer">
        {{ $category->links() }}
    </div>
    @include('livewire.category.components.create-details')
    @include('livewire.category.components.update-details')
</div>
<x-commons.swal id="delete-data">
    <x-slot:title>Are you sure you want to remove this data?</x-slot:title>
</x-commons.swal>
@push('scripts')
   <script>
    window.livewire.on('store', () => {
        $('#addcategoryDetails').modal('show');
    });
    $('tr').on('click', function(e){
        if(e.target.tagName == 'TD'){
            window.livewire.on('updateDetails', () => {
                $('#updateCategory').modal('show');
            });
        }
    });
    </script>
@endpush