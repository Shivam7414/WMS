<form action="{{ url('customer/store') }}" method="POST">
    @csrf
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" value="{{ $customer ? encryptId($customer->id) : null }}" name="customer_id">
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Name</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Short Name</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="short_name" value="{{ $customer->short_name }}" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Email</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" value="{{ $customer->email }}" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-sm-3">
                    <label>Mobile No</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" maxlength="10" name="mobile" value="{{ $customer->mobile }}" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>


