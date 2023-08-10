<div class="card-tools">
    <div class="row">
        <div class="col-md-3">
            <label>Sort by Category:</label>
            <select class="form-control form-control-sm" wire:model="filter_category">
                <option value="">All</option>
                @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{ucwords($cat->name)}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label>Sort by Product name:</label>
            <select class="form-control form-control-sm" wire:model="filter_orderBy">
                <option value="asc">Sort Ascending (A - z)</option>
                <option value="desc">Sort Descending (Z - a)</option>
            </select>
        </div>
    </div>
</div>
<br>