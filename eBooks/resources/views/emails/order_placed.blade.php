<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Hi {{ $user->name }},</h1>
    <p>Your order has been placed successfully. Here are the details:</p>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $order)
            <tr>
                <td>{{ $order['product_name'] }}</td>
                <td>{{ $order['qty'] }}</td>
                <td>${{ $order['price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Thank you for shopping with us!</p>
</body>
</html>
