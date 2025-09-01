@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Paynow Transfer</li>
    </ol>
    @if (Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
        <strong>{!! session('message') !!}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('paynowTransfer.create') }}" class="badge badge-primary p-2 mx-auto">Add New PaynowTransfer</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total PaynowTransfer
                    <span class="badge badge-danger badge-pill">$ {{ $totalpaynowTransfer }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">PaynowTransfer List</h5>
                    <!-- <div>
                    <input type="date" id="filterDate" class="form-control form-control-sm d-inline-block" style="width: 180px;">
                    <button class="btn btn-sm btn-light ml-2" id="pdfExport">
                        <i class="fa fa-file-pdf"></i> Export PDF
                    </button>
                </div> -->
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive" style="max-height: 450px; overflow-y: auto;">
                        <table id="expensesTable" class="table table-bordered table-striped mb-0">
                            <thead class="thead-dark sticky-top">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Amount (dollar)</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($PaynowTransfer as $transfer)
                                <tr>
                                    <td>{{ $loop->iteration + ($PaynowTransfer->currentPage() - 1) * $PaynowTransfer->perPage() }}</td>
                                   <td>{{ \Carbon\Carbon::parse($PaynowTransfer->transfer_date)->format('d-m-Y') }}</td>
                                    <td>{{ $transfer->transfer_title }}</td>
                                    <td><strong>$ {{ number_format($transfer->transfer_amount, 2) }}</strong></td>
                                    <td class="text-center">
                                        <a href="{{ route('paynowTransfer.edit',$transfer->id) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('paynowTransfer.delete',$transfer->id) }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure to delete this PaynowTransfer?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No expense records found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    {{ $PaynowTransfer->links() }}
                </div>
            </div>
        </div>
    </div>



</div>
@endsection