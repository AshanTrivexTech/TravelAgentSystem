<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quotation #{{ $quotation['id'] }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; }
        h1, h2, h3 { margin: 0; }
        h1 { text-align: center; font-size: 22px; margin-bottom: 10px; }
        h2 { font-size: 16px; margin-top: 20px; margin-bottom: 5px; border-bottom: 1px solid #000; padding-bottom: 3px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; }
        .section { margin-bottom: 20px; }
        .pricing-table td { text-align: right; }
        .footer { font-size: 10px; text-align: center; margin-top: 30px; color: #777; }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="section">
        <h1>Tour Quotation</h1>
        <p><strong>Quotation ID:</strong> {{ $quotation['id'] }}</p>
        <p><strong>Date:</strong> {{ date('d-m-Y') }}</p>
    </div>

    <!-- Agent & Customer Info -->
    <div class="section">
        <h2>Agent & Customer Details</h2>
        <table>
            <tr>
                <th>Agent Code</th>
                <td>{{ $quotation['ag_code'] }}</td>
                <th>Agent Name</th>
                <td>{{ $quotation['ag_name'] }}</td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>{{ $quotation['customer_name'] ?? 'N/A' }}</td>
                <th>Customer Email</th>
                <td>{{ $quotation['customer_email'] ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <!-- Tour Info -->
    <div class="section">
        <h2>Tour Details</h2>
        <table>
            <tr>
                <th>Tour Code</th>
                <td>{{ $quotation['tour_code'] }}</td>
                <th>From Date</th>
                <td>{{ $quotation['frm_date'] }}</td>
            </tr>
            <tr>
                <th>To Date</th>
                <td>{{ $quotation['to_date'] }}</td>
                <th>Pax Adult</th>
                <td>{{ $quotation['pax_adult'] }}</td>
            </tr>
            <tr>
                <th>Pax Child</th>
                <td>{{ $quotation['pax_child'] }}</td>
                <th>Mileage</th>
                <td>{{ $quotation['millage'] ?? 'N/A' }} km</td>
            </tr>
        </table>
    </div>


    <!-- Pricing Summary -->
    <div class="section">
        <h2>Pricing Summary</h2>
        <table class="pricing-table">
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>Adult Fare ({{ $quotation['pax_adult'] }} pax)</td>
                <td>{{ number_format($adult_price ?? 0, 2) }}</td>
            </tr>
            <tr>
                <td>Child Fare ({{ $quotation['pax_child'] }} pax)</td>
                <td>{{ number_format($child_price ?? 0, 2) }}</td>
            </tr>
            <tr>
                <td>Mileage Charge</td>
                <td>{{ number_format($trp_pp_price ?? 0, 2) }}</td>
            </tr>
            <tr>
                <th>Total Price</th>
                <th>{{ number_format($total ?? 0, 2) }}</th>
            </tr>
        </table>
    </div>

    <!-- Terms & Conditions -->
    <div class="section">
        <h2>Terms & Conditions</h2>
        <ul>
            <li>Quotation is valid for 7 days from the date of issue.</li>
            <li>Prices are subject to availability and change without prior notice.</li>
            <li>50% advance payment required to confirm the booking.</li>
            <li>All cancellations and refunds are subject to company policy.</li>
        </ul>
    </div>

    <div class="footer">
        <p>Thank you for choosing our travel services.</p>
    </div>

</body>
</html>
