@extends('layouts.app')

@section('content')
<main>
    <h1 class="title">Dashboard</h1>
    <ul class="breadcrumbs">
        <li><a href="#">Home</a></li>
        <li class="divider">/</li>
        <li><a href="#" class="active">Dashboard</a></li>
    </ul>
    <div class="info-data">
        <div class="card">
            <div class="head">
                <div>
                    <h2>1500</h2>
                    <p>Customers</p>
                </div>
                <i class="fas fa-users"></i>
            </div>
        </div>
        <div class="card">
            <div class="head">
                <div>
                    <h2>234</h2>
                    <p>Items</p>
                </div>
                <i class="fas fa-boxes"></i>
            </div>
        </div>
    </div>
</main>
@endsection
