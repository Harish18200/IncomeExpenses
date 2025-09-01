@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Income</li>
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
                    <a href="{{ route('incomes.create') }}" class="badge badge-success p-2 mx-auto">Add New Income</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Total Income
                    <span class="badge badge-primary badge-pill">$ {{ $totalIncomes }}</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Income List</h5>
                    <form action="{{ route('income.pdf') }}" method="POST" class="d-flex align-items-center gap-2">
                      @csrf
                        <select id="yearPicker" name="year" class="form-select form-select-sm" style="width: 100px;" required>
                            <option value="">Year</option>
                            @for ($y = date('Y'); $y >= 2000; $y--)
                            <option value="{{ $y }}">{{ $y }}</option>
                            @endfor
                        </select>

                        
                        <select id="monthPicker" name="month" class="form-select form-select-sm" style="width: 120px;" required>
                            <option value="">Month</option>
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ sprintf('%02d', $m) }}">
                                {{ date("F", mktime(0, 0, 0, $m, 1)) }}
                                </option>
                                @endfor
                        </select>

                 
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="fas fa-file-pdf"></i> PDF
                        </button>
                    </form>

                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Amount (dollar)</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($incomes as $key => $income)
                                <tr>
                                    <td>{{ $loop->iteration + ($incomes->currentPage()-1)*$incomes->perPage() }}</td>
                                    <td>{{ \Carbon\Carbon::parse($income->income_date)->format('d-m-Y') }}</td>
                                    <td>{{ $income->income_title }}</td>
                                    <td><strong>$ {{ number_format($income->income_amount, 2) }}</strong></td>
                                    <td class="text-center">
                                        <a href="{{ route('incomes.edit',$income->id) }}"
                                            class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('incomes.delete',$income->id) }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure to delete this income?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No income records found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $incomes->links() }}
                </div>
            </div>
        </div>
    </div>

</div>



@endsection