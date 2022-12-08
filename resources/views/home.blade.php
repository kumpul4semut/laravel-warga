@extends('master')

@section('konten')
    <h1>Dashboard</h1>

    {{-- dashboard ntan --}}
    <div class="row mt-3">
        <div class="col-2">
            <div class="card">
                <div class="card-body bg-primary text-center text-white rounded-lg shadow-sm">
                    <h6>Total User</h6>
                    <strong>{{ $total_user }}</strong>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="card-body bg-light text-center rounded-lg shadow-sm">
                    <h6>Total Warga</h6>
                    <strong>{{ $total_warga }}</strong>
                </div>
            </div>
        </div>
    </div>

    {{-- white space --}}
    <div style="height:300px"></div>
@endsection
