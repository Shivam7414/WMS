@extends('layouts.app')

@section('content')
<div class="row page-heading">
    <div class="col-md-6">
        <h2>Items - {{ $customer->name }}</h2>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-end">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('customer/index') }}">Customers</a></li>
            <li class="breadcrumb-item active">Items</li>
        </ol>
    </div>
</div>

<div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" onclick="openModal('{{ url('customer/in_item/add?customer_id='.$customer->id) }}', 'modal-fullscreen-sm-down')">Add Item</button>
    </div>
    <table class="table mt-3 border table-hover shadow-sm">
        <thead class="table-header-bg">
            <tr class="text-white">
                <th scope="col">S.No.</th>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Weight</th>
                <th scope="col">Count</th>
                <th scope="col">Vehicle No</th>
                <th scope="col">Block No</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($items as $key => $item)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->count }}</td>
                    <td>{{ $item->vehicle_no }}</td>
                    <td>{{ $item->block_no }}</td>
                    <td>
                        <button onclick="$(this).parents('tr').toggleClass('table-warning');$('.out-items-{{ $item->id }}').toggleClass('d-none');" class="btn btn-primary btn-sm"><i class="fa fa-arrow-down"></i></button>
                        <button onclick="openModal('{{ url('customer/out_item/add?in_item_id=' .$item->id) }}', 'modal-fullscreen-md-down')" class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button>
                        <button onclick="openModal('{{ url('customer/in_item/edit?item_id=' .$item->id) }}', 'modal-fullscreen-md-down')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button onclick="confirmById('Do you want to delete this item?', '{{ url('customer/item/delete?item_id='.$item->id) }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                    </td>
                </tr>
                @if($item->outItems->count())
                    <tr class="out-items-{{ $item->id }} table-info d-none">
                        <th scope="col">S.No.</th>
                        <th colspan="2" scope="col">Date</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Count</th>
                        <th colspan="2" scope="col">Vehicle No</th>
                        <th colspan="2" scope="col">Action</th>
                    </tr>
                    @foreach ($item->outItems as $key => $out_item)
                        <tr class="out-items-{{ $item->id }} table-info d-none">
                            <th scope="row">{{ $key + 1 }}</th>
                            <td colspan="2">{{ $out_item->date }}</td>
                            <td>{{ $out_item->weight }}</td>
                            <td>{{ $out_item->count }}</td>
                            <td>{{ $out_item->vehicle_no }}</td>
                            <td>{{ $item->block_no }}</td>
                            <td colspan="2">
                                <button onclick="openModal('{{ url('customer/out_item/edit?id=' .$out_item->id) }}', 'modal-fullscreen-md-down')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                <button onclick="confirmById('Do you want to delete this item?', '{{ url('customer/out_item/delete?id='.$out_item->id) }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="out-items-{{ $item->id }} table-primary d-none">
                        <td colspan="2"><b>Total In:</b> {{ $item->outItems->count() }}</td>
                        <td colspan="2"><b>Total Weight:</b> {{ $item->outItems->sum('weight') }}</td>
                        <td colspan="4"><b>Total Count:</b> {{ $item->outItems->sum('count') }}</td>
                    </tr>
                @else
                    <tr class="out-items-{{ $item->id }} bg-info d-none text-center">
                        <td colspan="8">No out item found</td>
                    </tr>
                @endif
            @empty
                <tr class="text-center">
                    <td colspan="8">No item found</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot class="bg-primary text-white">
            <tr>
                <td colspan="2"><b>Total In:</b> {{ $items->count() }}</td>
                <td colspan="2"><b>Total Weight:</b> {{ $items->sum('weight') }}</td>
                <td colspan="4"><b>Total Count:</b> {{ $items->sum('count') }}</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection