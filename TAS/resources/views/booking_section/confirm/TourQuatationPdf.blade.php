<!DOCTYPE html>
<html>
<head>
    <title>Quotation #{{ $quotation['id'] }}</title>
<style>
body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; }
</style>
</head>
<body>
    <h1>Tour Quotation</h1>
    <p><strong>Tour Code:</strong> {{ $quotation['tour_code'] }}</p>
<table>
    <tr>
        <th>From Date</th>
        <th>To Date</th>
        <th>Pax Adult</th>
        <th>Pax Child</th>
        <th>Agent Code</th>
        <th>Agent Name</th>
    </tr>
    <tr>
        <td>{{ $quotation['frm_date'] }}</td>
        <td>{{ $quotation['to_date'] }}</td>
        <td>{{ $quotation['pax_adult'] }}</td>
        <td>{{ $quotation['pax_child'] }}</td>
        <td>{{ $quotation['ag_code'] }}</td>
        <td>{{ $quotation['ag_name'] }}</td>
    </tr>
</table>
</body>
</html>
