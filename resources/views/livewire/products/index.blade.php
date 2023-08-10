<div>
   @include('livewire.products.components.filter')
   <!-- Button trigger modal -->
   <div class="card-tools">
        <div class="row">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                Add Product
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
                <th>SKU</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <!-- <th>Product Description</th> -->
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $key => $product)
                <tr wire:click="viewDetails('{{$product->id}}')" role="button">
                    <td>{{ $key + $products->firstItem() }}</td>
                    <td>{{ $product->sku }}</td>
                    <td><img src="{{asset('assets/img/'.$product->image)}}" width="50"></td>
                    <td>{{$product->name}}</td>
                    <!-- <td>{{$product->description}}</td> -->
                    <td>{{$product->category->name}}</td>
                    <td><button data-id="{{ $product->id }}" type="button" class="btn btn-outline-danger remove-data">Delete</button></td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="card-footer">
        {{ $products->links() }}
    </div>
    @include('livewire.products.components.create-details')
    @include('livewire.products.components.view-details')
</div>
<x-commons.swal id="delete-data">
    <x-slot:title>Are you sure you want to remove this data?</x-slot:title>
</x-commons.swal>
@push('scripts')
    <script>
        $('tr').on('click', function(e){
            if(e.target.tagName == 'TD'){
                window.livewire.on('viewDetails', () => {
                    $('#viewProductDetails').modal('show');
                });
            }
        });
    </script>
@endpush