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
            <li class="breadcrumb-item active">Edit</li>
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
                    <div class="card-header">Update Paynow Transfer</div>
                    <div class="card-body">
                        <form action="{{ route('paynowTransfer.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="paynowTransfer_id" value="{{ $paynowTransfer->id }}">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="paynowTransfer_title" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="transfer_title" value="{{ $paynowTransfer->transfer_title }}">
                                    <label for="paynowTransfer_title">Paynow Transfer Description</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="number" step="any" min="0.01" id="paynowTransfer_amount" class="form-control" placeholder="Password" required="required" name="transfer_amount" value="{{ $paynowTransfer->transfer_amount }}">
                                    <label for="paynowTransfer_amount">Paynow Transfer Amount</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="date" id="paynowTransfer_date" class="form-control" placeholder="Password" required="required" name="transfer_date" value="{{ $paynowTransfer->transfer_date }}">
                                    <label for="paynowTransfer_date">Paynow Transfer Date</label>
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('paynowTransfer.index') }}" class="btn btn-success">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
