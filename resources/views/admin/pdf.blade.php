<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order PDF</title>
</head>

<body>

    <h1>Order Detiles</h1>
    Customer Name :<h3 style="color: skyblue;">{{ $order->name }}</h3>
    Customer email :<h3 style="color: skyblue;">{{ $order->email }}</h3>
    Customer phone :<h3 style="color: skyblue;">{{ $order->phone }}</h3>
    Customer Address :<h3 style="color: skyblue;">{{ $order->address }}</h3>
    Customer ID :<h3 style="color: skyblue;">{{ $order->user_id }}</h3>

    Product Name :<h3 style="color: skyblue;">{{ $order->product_title }}</h3>
    Product price :<h3 style="color: skyblue;">{{ $order->price }}</h3>
    Product quantity :<h3 style="color: skyblue;">{{ $order->quantity }}</h3>
    payment status :<h3 style="color: skyblue;">{{ $order->payment_status }}</h3>
    Product ID :<h3 style="color: skyblue;">{{ $order->product_id }}</h3>
    delivery status :<h3 style="color: skyblue;">{{ $order->delivery_status }}</h3>

</body>

</html>
