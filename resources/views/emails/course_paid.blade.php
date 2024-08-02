<!DOCTYPE html>
<html>
<head>
    <title>Course Purchase Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        p {
            font-size: 16px;
            color: #333333;
        }
        .list-group-item {
            border: none;
            padding-left: 0;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Dear {{ $user->name }},</h3>
        <p>Thank you for purchasing the following courses under the {{ $part_name }} program: {{$program->title}}</p>
        <ul class="list-group">
            @foreach ($selectedCourses as $course)
            <li>{{ \App\Models\Course::find($course['id'])->title }}</li>
        @endforeach
        </ul>
        @if (!empty($charges))
            <p>Additional Charges:</p>
            <ul class="list-group">
                @foreach ($charges as $charge)
                    <li class="list-group-item">{{ $charge['item'] }}: ₦{{ number_format($charge['amount'], 2) }}</li>
                @endforeach
            </ul>
        @endif
        @if (!empty($discountedAmount))
        <p>Discounted Amount:</p>
        <p>₦{{$discountedAmount}}</p>
    @endif
        <p>Total Amount: ₦{{ number_format($amount, 2) }}</p>
        <p>Your transaction ID is <strong>{{ $reference_id }}.</strong></p>
        <p>Best regards,</p>
        <p>Nigerian Institute of Public Relations (NIPR)</p>
        <div class="footer">
            <p>&copy; {{ date('Y') }} NIPR. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
