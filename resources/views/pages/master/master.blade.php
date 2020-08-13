@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <!-- Top Statistics -->
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <h2 class="mb-1">{{ count($users->where('status', '1')) }}</h2>
                        <p>Total Users</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini  mb-4">
                    <div class="card-body">
                        <h2 class="mb-1">{{ count($posts) }}</h2>
                        <p>Total Posts</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <h2 class="mb-1">{{ count($posts->where('status', 'PENDING')) }}</h2>
                        <p>Pending Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
