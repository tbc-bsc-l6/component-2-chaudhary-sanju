<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlacedEmail;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $userId = Auth::id();

        // Check if the product already exists in the cart for the user
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            // Redirect to home with an error message
            return redirect('/')->with('error', 'Product is already in your cart.');
        }

        // Add the product to the cart with a quantity of 1
        Cart::create([
            'user_id' => $userId,
            'product_id' => $id,
            'qty' => 1,
        ]);

        // Redirect to home with a success message
        return redirect('/')->with('success', 'Product added to cart successfully.');
    }

    public function viewCart()
    {
        $userId = Auth::id(); // Get the authenticated user ID
        $carts = Cart::where('user_id', $userId)->with('product')->paginate(10);

        // Calculate total quantity and total price
        $totalQty = $carts->sum('qty'); // Sum of all cart item quantities
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->qty * $cart->product->price; // Calculate total price
        });

        return view('cart', compact('carts', 'totalQty', 'totalPrice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $cart = Cart::findOrFail($id);

        $cart->qty = $request->qty;
        $cart->updated_at = now();
        $cart->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        // Get the authenticated user ID
        $userId = Auth::id();

        // Find the cart item for the current user
        $cart = Cart::where('user_id', $userId)->where('id', $id)->first();

        if ($cart) {

            // Delete the cart item
            $cart->delete();

            return redirect()->route('cart.view')->with('success', 'Cart item removed successfully.');
        }

        return redirect()->route('cart.view')->with('error', 'Cart item not found.');
    }

    public function checkout()
    {
        $userId = Auth::id(); 
        $user = Auth::user(); 
        $carts = Cart::where('user_id', $userId)->with('product')->get(); 

        // Check if cart is empty
        if ($carts->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        $orderDetails = []; // Array to store order details

        // Create orders from cart items
        foreach ($carts as $cart) {
            $order = Order::create([
                'user_id' => $userId,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'status' => 'pending',
            ]);

            // Add order details to array
            $orderDetails[] = [
                'product_name' => $cart->product->title,
                'qty' => $cart->qty,
                'price' => $cart->product->price,
            ];
        }

        // Remove the cart items after creating the orders
        Cart::where('user_id', $userId)->delete();

        // Send email to the user
        Mail::to($user->email)->send(new OrderPlacedEmail($user, $orderDetails));

        // Redirect with success message
        return redirect()->route('cart.view')->with('success', 'Your order has been placed successfully!');
    }


    public function viewOrder()
    {
        $userId = Auth::id(); 
        $orders = Order::where('user_id', $userId)
            ->with('product')
            ->paginate(5);

        return view('order', compact('orders'));
    }

    public function viewAllOrder()
    {
        $orders = Order::with(['product', 'user'])->paginate(5);

        return view('admin.order.list', compact('orders'));
    }

    public function confirmOrder($id)
    {
        // Find the order by ID
        $order = Order::findOrFail($id);

        // Update the status to 'confirmed'
        $order->update(['status' => 'confirm']);

        // Redirect back with a success message
        return redirect()->route('order.index')->with('success', 'Order status updated to confirmed.');
    }
}
