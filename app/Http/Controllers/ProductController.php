<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function home()
    {
        $categories = Category::limit(5)->get();
        $topSeller = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();
        $products = Product::with('category')->where('status','Active')->get(); // eager load category
        $dealOfTheDay = Product::where('discount_price', '!=', null)->orderByDesc('created_at')->first();
        $topRated = Product::orderByDesc('average_rating')->limit(5)->get();
        return view('frontend.pages.home', compact('products', 'categories', 'topSeller', 'dealOfTheDay', 'topRated'));
    }
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->where('status','Active')->get(); // eager load category
        return view('frontend.pages.products', compact('products', 'categories'));
    }
    // search

    public function search(Request $request)
    {
          $query = $request->input('query');

    $products = Product::with('category')->where('status','Active')
        ->where('name', 'LIKE', "%$query%")
        ->orWhere('description', 'LIKE', "%$query%")
        ->orWhereHas('category', function($q) use ($query){
            $q->where('name', 'LIKE', "%$query%");
        })
        ->get();

    // 👉 AJAX request
    if ($request->ajax()) {
        return view('partials.productCard', compact('products', 'query'))->render();
    }
    // 👉 normal page load
    return view('frontend.pages.search', compact('products', 'query'));
    }
    
    public function render(Request $request)
    {
        $categories = Category::all();
        $priceRange = $request->input('price_range');
        $products = Product::with('category')->where('status','Active')->latest()
            ->when($request->category_id, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($priceRange, function ($query, $priceRange) {
                $query->where(function ($q) use ($priceRange) {
                    foreach ($priceRange as $range) {
                        switch ($range) {
                            case '100':
                                $q->orWhere('price', '<', 100);
                                break;
                            case '100-300':
                                $q->orWhereBetween('price', [100, 300]);
                                break;
                            case '300-500':
                                $q->orWhereBetween('price', [300, 500]);
                                break;
                            case '500+':
                                $q->orWhere('price', '>=', 500);
                                break;
                        }
                    }
                });
            })
            ->get();

        return view('partials.productCard', compact('products', 'categories'));
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.product-details', compact('product'));
    }
    // about product
    public function aboutProuct($slug, $data)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        if($data=='reviews'){
            $reviews=$product->reviews()->with('user')->get();
            return view('partials.productDetails.reviews', compact('product','reviews'));
        }
        return view('partials.productDetails.' . $data, compact('product'));
    }
    // review submit
    public function submitReview(Request $request, $slug){
        $product =Product::where('slug', $slug)->firstOrFail();
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
        ]);
        $review =$product->reviews()->create([
            'user_id' => auth()->guard('web')->id(),
            'rating' => $validated['rating'],
            'title' => $validated['title'] ?? null,
            'comment' => $validated['comment'] ?? null,
        ]);
        // update product average rating and total reviews
        $product->average_rating = $product->reviews()->avg('rating');
        $product->total_reviews = $product->reviews()->count();
        $product->save();
        return response()->json(['message' => 'Review submitted successfully','success' => true]);

    }
    // related products
    public function relatedProducts($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('partials.productCard', compact('products'));
    }
    // top rated products
    public function topRated()
    {
        $products = Product::orderByDesc('average_rating')->limit(5)->get();
        return view('partials.productCard', compact('products'));
    }
    public function newArrivals()
    {
        $products = Product::where('is_new', true)->orderByDesc('created_at')->limit(5)->get();
        return view('partials.productCard', compact('products'));
    }
    public function categories()
    {
        $categories = Category::get();
        return view('frontend.pages.categories', compact('categories'));
    }
    // add to cart
    public function addToCart(Request $request)
    {
        $id = $request->input('product_id');
        $checkCart = Cart::where(['product_id' => $id, 'user_id' => auth()->guard('web')->id()])->first();
        if ($checkCart) {
            $checkCart->quantity += 1;
            $updated = $checkCart->save();
            if ($updated) {
                $cartCount = auth()->guard('web')->user()->carts->sum('quantity');
                return response()->json(['success' => true, 'message' => 'Product quantity updated in cart', 'cartCount' => $cartCount]);
            }
            return response()->json(['success' => false, 'message' => 'Failed to add product to cart']);
        } else {
            $added = Cart::create([
                'user_id' => auth()->guard('web')->id(),
                'product_id' => $id,
                'quantity' => 1,
            ]);
            if ($added) {
                $cartCount = auth()->guard('web')->user()->carts->sum('quantity');
                return response()->json(['success' => true, 'message' => 'Product added to cart', 'cartCount' => $cartCount]);
            } else {
                return response()->json(['success' => false, 'message' => 'Failed to update product quantity in cart']);
            }
        }
        // logic to add product to cart
    }

    // view cart
    public function viewCart()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->guard('web')->id())->get();
        return view('frontend.pages.cart', compact('cartItems'));
    }
    public function viewCartData()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->guard('web')->id())->get();
        return view('partials.cartCard', compact('cartItems'));
    }
    // remove cart
    public function destroyCart($id){
        $cart =Cart::findOrFail($id);
        $cart->delete($cart);
        $cartItems = Cart::with('product')->where('user_id', auth()->guard('web')->id())->get();
        return response()->json([
    'status' => true,
    'message' => 'Cart Item Deleted successfully',
    'html' => view('partials.cartCard', compact('cartItems'))->render()
]);    }
    // viewProceedData
    public function viewProceedData()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->guard('web')->id())->get();
        return view('partials.orderCard', compact('cartItems'));
    }
    // update updateQty
    public function updateQty(Request $request)
    {
        $cart = Cart::findOrFail($request->id);
        $cart->quantity = $request->qty;
        if ($cart->save()) {
            return response()->json(['message' => 'cart updated Successfuly', 'success' => true, 'cartCount' => auth()->guard('web')->user()->carts->sum('quantity')]);
        } else {
            return response()->json(['message' => 'Failed to update product quantity in cart', 'success' => false]);
        }
    }
    // orderSubmit
    public function orderSubmit(Request $request)
    {
        $cartItems = Cart::where('user_id', auth()->guard('web')->user()->id)->get();
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        if($subtotal < 500){
            return response()->json(['message'=>'Minimum Order Price $500','success',false],404);
        }
        $tax = 19;
        $shipping = 0;
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required'
        ]);
        $order = Order::create([
            'user_id' => auth()->guard('web')->user()->id,
            'order_number' => 'ORD-' . rand(10000, 99999),
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total' => $subtotal + $tax + $shipping,
            'payment_method' => 'COD',
            'payment_status' => 'pending',
            'shipping_adderess' => $request->address,
        ]);
        $user = auth()->guard('web')->user();
        if ($user) {
            $user->total_orders += 1;
            $user->save();
        }
        foreach ($cartItems as $item) {
            $item->product->decrement('stock_quantity', $item->quantity);
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }
        return response()->json(['message' => 'order placed successfully']);
    }
}
