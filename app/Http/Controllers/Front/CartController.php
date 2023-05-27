<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('front.pages.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Article ajouté avec succès !');

        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('front.cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('front.cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('front.cart.list');
    }

    public function validateCart()
    {
        $items = \Cart::getContent();
        $items_id = [];
        foreach ($items as $item) {
            $items_id[$item->id] = [
                'quantity' => $item->quantity,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            // Update quantity products
            $product = Product::find($item->id);
            $product->update(['quantity' => $product->quantity - $item->quantity]);
        }
        $order = Order::create([
           'user_id' => Auth::id(),
            'payed_at' => Carbon::now(),
            'status' => 'payed',
            'order_number' => Str::random(),
            'total' => \Cart::getTotal()
        ]);
        $order->products()->sync($items_id);

        $this->clearAllCart();

        return redirect()->back()->with('success', 'Votre commande est validée !');
    }
}
