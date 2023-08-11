<div>
   @include('livewire.dashboard.components.filter')
    <table id="example" class="table table-striped table-bordered" style="width:100%" >
        <thead>
            <tr>
                <th>#</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <!-- <th>Product Description</th> -->
                <th>Category</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse($products as $key => $product)
                <tr wire:click="viewDetails('{{$product->id}}')" role="button">
                    <td>{{ $key + $products->firstItem() }}</td>
                    <td><img src="{{asset('storage/img/'.$product->image)}}" width="50"></td>
                    <td>{{$product->name}}</td>
                    <!-- <td>{{$product->description}}</td> -->
                    <td>{{$product->category->name}}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="card-footer">
        {{ $products->links() }}
    </div>
    @include('livewire.dashboard.components.view-details')
</div>

@push('scripts')
    <script>
        window.livewire.on('viewDetails', () => {
            $('#viewProductDetails').modal('show');
        });
    </script>
@endpush