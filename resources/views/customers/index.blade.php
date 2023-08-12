@extends('layouts.app')

@section('content')
<div class="row page-heading">
    <div class="col-md-6">
        <h2>Customers</h2>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-end">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Customers</li>
        </ol>
    </div>
</div>

<div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary me-2" onclick="openModal('{{ url('customer/in_item/edit') }}','modal-fullscreen-sm-down')">Add Item</button>
        <button class="btn btn-primary" onclick="openModal('{{ url('customer/edit') }}','modal-fullscreen-sm-down')">Add Customer</button>
    </div>
    <table class="table mt-3 border table-hover shadow-sm" id="customer">
        <thead class="table-header-bg">
            <tr class="text-white">
                <th scope="cbg-primol">S.No.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($customers as $key => $customer)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>
                    <a href="{{ url('customer/in_item/'.$customer->id.'/index') }}">{{ $customer->name }} ({{ $customer->short_name }})</a></td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->mobile }}</td>
                    <td>
                        <button onclick="openModal('{{ url('customer/edit?customer_id=' .encryptId($customer->id)) }}')" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        {{-- <button onclick="confirmById('Do you want to delete this customer?','{{ url('customer/delete?id='.encryptId($customer->id)) }}');" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button> --}}
                    </td>
                </tr>
            @empty
                <tr class="text-center"><td colspan="6">No Customers Found</td></tr>   
            @endforelse
        </tbody>
    </table>
</div>
@endsection