<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Income Report</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h3>Income Report ({{ $date }})</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
        @foreach($incomes as $income)
            <tr>
                <td>{{ \Carbon\Carbon::parse($income->income_date)->format('d-m-Y') }}</td>
                <td>{{ $income->income_amount }}</td>
                <td>{{ $income->income_title }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
