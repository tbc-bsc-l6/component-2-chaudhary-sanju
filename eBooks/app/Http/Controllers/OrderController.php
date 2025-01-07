<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function addToCart(Request $request, $id)
    {
        $userId = Auth::id(); // Assuming the user is authenticated

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
        // Validate the incoming quantity
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $userId = Auth::id(); // Get the authenticated user ID
        $cart = Cart::where('user_id', $userId)->where('id', $id)->first();

        if ($cart) {

            $cart->qty = $request->qty;
            $cart->save();

            return redirect()->route('cart.view')->with('success', 'Cart updated successfully.');
        }

        return redirect()->route('cart.view')->with('error', 'Cart item not found.');
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
}
