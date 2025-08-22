@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('paynowTransfer.index') }}">Paynow Transfer</a>
            </li>
            <li class="breadcrumb-item active">Insert</li>
        </ol>
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
        <div class="row">
            <div class="col-xl-8 offset-2">
                <div class="card mx-auto mt-5">
                    <div class="card-header">Insert New Paynow Transfer</div>
                    <div class="card-body">
                        <form action="{{ route('paynowTransfer.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="paynowtransfer_title" class="form-control" placeholder="Paynow Transfer Description" required="required" autofocus="autofocus" name="transfer_title">
                                    <label for="paynowtransfer_title">Paynow Transfer Description</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="number" step="any" id="paynowtransfer_amount" min="0.01"  class="form-control" placeholder="Paynow Transfer Amount" required="required" name="transfer_amount">
                                    <label for="paynowtransfer_amount">Paynow Transfer Amount</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="date" id="paynowtransfer_amount" class="form-control" placeholder="Paynow Transfer Date" required="required" name="transfer_date" value="{{ date('Y-m-d') }}">
                                    <label for="paynowtransfer_amount">Paynow Transfer Date</label>
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('paynowTransfer.index') }}" class="btn btn-success">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
