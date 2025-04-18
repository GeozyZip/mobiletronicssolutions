@extends('layouts.public')

@section('content')

    <style>
        :root {
            --primary-color: #4a6cf7;
            --light-primary: #eef2ff;
            --dark-text: #333;
            --light-text: #666;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --light-gray: #f9fafb;
        }

        .page-header {
            margin-top: 2rem;
            margin-bottom: 2rem;
            position: relative;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--light-gray);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .page-title h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark-text);
            margin-top: 100px;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .page-subtitle {
            font-size: 1rem;
            color: var(--light-text);
            margin-bottom: 1.5rem;
        }

        .card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 2rem auto; /* This centers it horizontally */
    width: 50%;
}


        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
        }

        .card-body {
            padding: 1rem;
            overflow-x: auto;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }

        .booking-table th {
            text-align: left;
            padding: 1rem;
            font-weight: 600;
            color: var(--light-text);
            border-bottom: 2px solid #f0f0f0;
            white-space: nowrap;
        }

        .booking-table td {
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
            color: var(--dark-text);
        }

        .booking-table tr:last-child td {
            border-bottom: none;
        }

        .booking-table tr:hover {
            background-color: var(--light-gray);
        }

        .status-badge {
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-block;
            text-transform: capitalize;
        }

        .status-pending {
            background-color: #fff7ed;
            color: #c2410c;
        }

        .status-accepted {
            background-color: #ecfdf5;
            color: #065f46;
        }

        .status-rejected {
            background-color: #fef2f2;
            color: #b91c1c;
        }

        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
        }

        .empty-icon {
            font-size: 3rem;
            color: #d1d5db;
            margin-bottom: 1rem;
        }

        .empty-text {
            font-size: 1rem;
            color: var(--light-text);
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.3s ease;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border: 1px solid var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #3b5cf5;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 1.5rem;
            }

            .card-header {
                padding: 1rem;
                flex-direction: column;
                align-items: flex-start;
            }

            .booking-table th,
            .booking-table td {
                padding: 0.75rem 0.5rem;
                font-size: 0.85rem;
            }

            .status-badge {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar would be included from layout -->
    
   
        <div class="page-header">
            <h1 class="page-title">Your Booking History</h1>

        </div>
        
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">All Bookings</h2>
            </div>
            <div class="card-body">
                @forelse ($bookings as $booking)
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th>Service Type</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>{{ ucfirst($booking->bookingName) }}</strong></td>
                                <td>{{ date('M d, Y', strtotime($booking->date)) }}</td>
                                <td>{{ date('h:i A', strtotime($booking->time)) }}</td>
                                <td>{{ $booking->phoneNumber }}</td>
                                <td>
                                    <span class="status-badge status-{{ strtolower($booking->status) }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>{{ $booking->message ?: 'No message' }}</td>
                            </tr>
                        </tbody>
                    </table>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3 class="empty-text">You don't have any bookings yet</h3>
                        <a href="{{ route('booking2') }}" class="btn btn-primary">Make a Booking</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
@endsection
