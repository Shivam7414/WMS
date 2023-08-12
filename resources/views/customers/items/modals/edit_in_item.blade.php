<form action="{{ url('customer/in_item/store') }}" method="POST">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add In Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" value="{{ $item->id }}">
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
                    <label>Name</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
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
                    <label>Block No</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="block_no" value="{{ $item->block_no }}" required>
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
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Customer</label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" name="customer_id" required>
                        <option value="">-- Select Customer --</option>
                        <!-- <option value="create_new_customer">Create New Customer</option> -->
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->short_name }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name=customer_id]').val('{{ $item->customer_id }}');
    });
</script>