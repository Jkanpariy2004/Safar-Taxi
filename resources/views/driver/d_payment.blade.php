<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Button to open the modal -->
    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#razorpayModal">
        Add Money in Wallet
    </button>

    <!-- Modal Structure -->
    <div class="modal fade" id="razorpayModal" tabindex="-1" role="dialog" aria-labelledby="razorpayModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="razorpayModalLabel">Add Money to Wallet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="razorpayForm" method="POST" action="{{ route('process.payment') }}">
                        @csrf
                        <label for="amount">Enter Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount to Add in Wallet" min="100" />
                        <span id="error-message"></span>

                        <script>
                            const amountInput = document.getElementById('amount');
                            const errorMessage = document.getElementById('error-message');

                            amountInput.addEventListener('input', () => {
                                if (amountInput.value < 100) {
                                    errorMessage.textContent = 'Amount must be at least 100 rs.';
                                } else {
                                    errorMessage.textContent = '';
                                }
                            });
                        </script>
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                        <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                        <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="openRazorpay()" class="btn btn-primary">Proceed to Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        function orderid() {
            return Math.floor(Math.random() * 90000000) + 10000000;
        }

        function openRazorpay() {
            var amount = document.getElementById('amount').value;
            var amountInPaise = amount * 100;

            var options = {
                "key": "rzp_test_NXkmOvfVPrzbBy",
                "amount": amountInPaise,
                "currency": "INR",
                "name": "Safar Mobility",
                "description": "Payment for Taxi Booking",
                "image": "https://safarmobility.in/assets/img/icon_logo.jpg",
                "handler": function(response) {
                    if (response.razorpay_payment_id) {
                        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                        var $orderid = orderid();
                        document.getElementById('razorpay_order_id').value = 'safar_' + $orderid;
                        document.getElementById('razorpay_signature').value = 'safar_' + $orderid;
                        document.getElementById('razorpayForm').submit();
                    } else {
                        console.error('Razorpay Response is missing required fields');
                        alert('An error occurred during payment. Please try again.');
                    }
                },
                "prefill": {
                    "name": "{{ $driverdata->fullname }}",
                    "email": "{{ $driverdata->email }}",
                    "contact": "{{ $driverdata->mobile }}"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#FFD700",
                    "background": "#3F3B3D",
                    "text": "#444444"
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        }

        $(document).ready(function() {
            @if(isset($showModal) && $showModal)
            $('#razorpayModal').modal('show');
            @endif
        });
    </script>
</body>

</html>