<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Receipt</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .receipt {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .header p {
            margin: 5px 0;
            color: #777;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }
        .details p strong {
            color: #000;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .thank-you {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background-color: #f0f8ff;
            border-radius: 10px;
        }
        .thank-you h2 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .thank-you p {
            margin: 10px 0;
            font-size: 16px;
            color: #555;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .receipt {
                padding: 15px;
            }
            .header h1 {
                font-size: 20px;
            }
            .details p {
                font-size: 14px;
            }
            .thank-you h2 {
                font-size: 18px;
            }
            .thank-you p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="receipt">
        <!-- Header with Company Logo -->
        <div class="header">
            <img src="{{ public_path('assets/images/logoo.jpg') }}" alt="Company Logo" class="mb-3">
            <h1>Donation Receipt</h1>
            <p>Official Receipt for Your Generous Contribution</p>
        </div>

        <!-- Donation Details -->
        <div class="details">
            <p><strong>Receipt Number:</strong> {{ $donation->receipt_number ?? 'N/A' }}</p>
            <p><strong>Donor Name:</strong> {{ $donation->users->profile->full_name }}</p>
            <p><strong>Donation Amount:</strong> RM {{ number_format($donation->amount, 2) }}</p>
            <p><strong>Campaign:</strong> {{ $donation->campaign->title }}</p>
            <p><strong>Donation Date:</strong> {{ $donation->created_at->format('d M Y') }}</p>
            <p><strong>Payment Status:</strong> {{ ucfirst($donation->payment_status) }}</p>
        </div>

        <!-- Thank You Section -->
        <div class="thank-you">
            <h2>Thank You for Your Support!</h2>
            <p>Your generous donation will make a significant impact on our cause. We deeply appreciate your contribution and commitment to making a difference.</p>
            <p>Together, we can achieve great things!</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>This is an official receipt for your donation. Please keep it for your records.</p>
            <p>For any inquiries, please contact us at <strong>support@example.com</strong>.</p>
        </div>
    </div>
</body>
</html>