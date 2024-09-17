<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid d-flex align-items-center justify-content-center mt-4">
            <div class="mb-3">
               <p>Order ID : {{ $orderid }}</p>
               <p>Order Amount : {{ number_format($razorpayOrder->amount / 100,2) }}</p>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-dark">Pay now</button>
            </div>
    </div>


        {{-- //  ///////////////////////// --}}

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>



<script>
    var urls = "{{ route('success') }}";

        var options = {
            key: "' . $YOUR_KEY_ID . '", // Enter the Key ID generated from the Dashboard
            amount: ' . $order->5000 . ', // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            currency: "' . $order->INR . '",
            name: "Acme Corp",
            description: "Test transaction",
            image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
            order_id: "' . $order_IluGWxBm9U8zJ8 . '", // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            prefill: {
                name: "Gaurav Kumar",
                email: "gaurav.kumar@example.com",
                contact: "9000090000"
            },
            notes: {
                address: "Razorpay Corporate Office"
            },
            theme: {
                "color": "#3399cc"
            },
            callback_url: "' . $callback_url . '"
        };
        var rzp = new Razorpay(options);
        rzp.open();

</script>

        {{-- //   //////////////////////// --}}

<script>
        $data = [
    "key"               => $rzp_test_nR21xgiHz3Rdnv, // Enter the Key ID generated from the Dashboard
    "amount"            => {{ $razorpayOrder->amount }}, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency"          => $INR,
    "name"              => "Acme Corp",
    "description"       => "Test transaction",
    "image"             => "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
    "prefill"           => [
    "name"              => "Gaurav Kumar",
    "email"             => "gaurav.kumar@example.com",
    "contact"           => "9000090000",
    ],
    "notes"             => [
    "address"           => "Razorpay Corporate Office",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#3399cc"
    ],
    "order_id"          => {{ $razorpayOrder->id }}, // This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler"           =>function (response){
        console.log(response);
        // window.location.href = urls
    } ,
];

$json = json_encode($data);
require("checkout/{$checkout}.php");
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

