<form action="{{ url('customer/out_item/store') }}" method="POST">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Out Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" value="{{ $item->id }}">
            <input type="hidden" name="in_item_id" value="{{ $item->in_item_id }}">
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Date</label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="date" value="{{ $item->date ?? now()->format('Y-m-d') }}" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Weight</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="weight" value="{{ $item->weight }}" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Count</label>
                </div>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="count" value="{{ $item->count }}" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Vehicle No</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="vehicle_no" value="{{ $item->vehicle_no }}" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>