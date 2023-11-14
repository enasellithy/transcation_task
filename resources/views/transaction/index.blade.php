@extends('layouts.app')

@push('css')

@endpush

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row dataTables_wrapper">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Home /</span>
                Transaction
            </h4>

            <div class="nav-align-top mb-4">
                <div class="tab-content dataTables_wrapper">
                    <div class="card-header flex-column flex-md-row mb-5">
                        <div class="head-label text-center"><h5 class="card-title mb-0">Transaction</h5></div>
                        @include('transaction.create')
                        <!-- DataTable with Buttons -->
                    </div>

                    <div class="card">
                        <livewire:transaction-table theme="bootstrap-4" />
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- / Content -->

@endsection



