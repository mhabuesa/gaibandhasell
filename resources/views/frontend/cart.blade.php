@extends('layouts.frontend')
@push('title')
<title>Cart - Gaibandhasell.com </title>
@endpush
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>

                                    @foreach ($stores as $store )
                                    <tr class="product-box-contain">
                                        <table class="table mb-5">
                                            <tbody>
                                                <tr>
                                                    <td colspan="5" class=" p-0">
                                                        <div class="product border-0 ">
                                                            <p><span class="p-2 bg_success text-white br_5">Store: {{$store->rel_to_store->store_name}}</span></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @foreach (App\Models\CartModel::where('customer_id', Auth::guard('customer')->user()->id)->where('store_id', $store->store_id)->get() as $cart )
                                                <tr class="product-box-contain">
                                                    <td class="product-detail">
                                                        <div class="product border-0">
                                                            <a href="{{route('product', $cart->rel_to_product->slug)}}" class="product-image">
                                                                <img src="{{asset('uploads')}}/product/preview/{{$cart->rel_to_product->preview}}"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                            <div class="product-detail">
                                                                <ul>
                                                                    <li class="name">
                                                                        <a href="{{route('product', $cart->rel_to_product->slug)}}" title="{{$cart->rel_to_product->product_name}}">
                                                                        @if (strlen($cart->rel_to_product->product_name) > 20)
                                                                            {{substr($cart->rel_to_product->product_name, 0,20).'...'}}
                                                                        @else
                                                                            {{$cart->rel_to_product->product_name}}
                                                                        @endif
                                                                            </a>
                                                                    </li>
                                                                    @if ($cart->color_id != null)
                                                                    <li class="text-content">
                                                                        <span class="text-title">Color:</span> {{$cart->rel_to_color->color_name}}
                                                                    </li>
                                                                    @endif
                                                                    @if ($cart->size_id != null)
                                                                    <li class="text-content">
                                                                        <span class="text-title">Size</span> - {{$cart->rel_to_size->size}}
                                                                    </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="price">
                                                        <h4 class="table-title text-content">Price</h4>
                                                        <h5>&#2547;<span class="price" data-id="{{ $cart->id }}">{{$cart->rel_to_product->after_discount}}</span>
                                                            @if ($cart->rel_to_product->discount != 0)
                                                            <del class="text-content">&#2547;{{$cart->rel_to_product->price}}</del>
                                                            @endif
                                                        </h5>
                                                        @if ($cart->rel_to_product->discount != 0)
                                                            <h6 class="theme-color">You Save : &#2547;{{$cart->rel_to_product->price - $cart->rel_to_product->after_discount}}</h6>
                                                        @endif
                                                    </td>

                                                    <td class="quantity">
                                                        <h4 class="table-title text-content">Qty</h4>
                                                        <div class="quantity-price">
                                                            <form>
                                                                @csrf
                                                                <div class="cart_qty">
                                                                    <div class="input-group">
                                                                        <button type="button" class="btn qty-minus" data-type="minus" data-id="{{ $cart->id }}">
                                                                            <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                                        </button>
                                                                        <input class="form-control input-number qty-input" type="text" name="quantity" data-id="{{ $cart->id }}" value="{{ $cart->quantity }}">
                                                                        <button type="button" class="btn qty-plus" data-type="plus" data-id="{{ $cart->id }}">
                                                                            <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>

                                                    <td class="subtotal">
                                                        <h4 class="table-title text-content">Total</h4>
                                                        <h5>&#2547; <span class="total" data-id="{{ $cart->id }}"></span></h5>
                                                    </td>

                                                    <td class="save-remove">
                                                        <h4 class="table-title text-content">Action</h4>
                                                        <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a>
                                                        <a class="remove close_button" href="javascript:void(0)" data-id="{{ $cart->id }}">Remove</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>
                        <div class="summery-contain">
                            <ul>
                                <li>
                                    <h4><strong>Note:</strong> Different delivery charges will be added for each Store</h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (BDT)</h4>
                                <h4 class="price theme-color">&#2547; <span class="total_price">0</span></h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <button onclick="location.href = '{{route('checkout')}}';"
                                        class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                </li>

                                <li>
                                    <button onclick="location.href = 'index.html';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection


@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const updateTotal = (id, subtotal = null) => {
        const quantityInput = document.querySelector(`input[data-id="${id}"]`);
        const priceElement = document.querySelector(`.price[data-id="${id}"]`);
        const totalElement = document.querySelector(`.total[data-id="${id}"]`);

        const quantity = parseInt(quantityInput.value);
        const price = parseFloat(priceElement.innerText);
        const total = subtotal ? subtotal : Math.round(quantity * price); // Use AJAX subtotal if provided

        totalElement.innerText = total;

        updateCartTotal();
    }

    const updateCartTotal = () => {
        let cartTotal = 0;

        document.querySelectorAll('.total').forEach(totalElement => {
            cartTotal += parseFloat(totalElement.innerText);
        });

        document.querySelector('.total_price').innerText = `${cartTotal}`;
    }

    // Function to handle AJAX request and update the cart
    const updateCartQuantity = (cartId, newQuantity) => {
        $.ajax({
            url: '{{ route('cart.update.quantity') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                cart_id: cartId,
                quantity: newQuantity
            },
            success: function(response) {
                if (response.success) {
                    // Update the subtotal in the UI
                    updateTotal(cartId, response.subtotal);
                } else {
                    alert(response.message);
                }
            }
        });
    }

    document.querySelectorAll('.qty-plus').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const quantityInput = document.querySelector(`input[data-id="${id}"]`);
            const newQuantity = parseInt(quantityInput.value) + 1;
            quantityInput.value = newQuantity;

            updateCartQuantity(id, newQuantity);
        });
    });

    document.querySelectorAll('.qty-minus').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const quantityInput = document.querySelector(`input[data-id="${id}"]`);
            const currentValue = parseInt(quantityInput.value);
            const newQuantity = currentValue > 1 ? currentValue - 1 : currentValue;

            if (newQuantity < 1) return; // Prevent quantity going below 1

            quantityInput.value = newQuantity;

            updateCartQuantity(id, newQuantity);
        });
    });

    // Initial total calculation for each item and cart total
    document.querySelectorAll('.qty-input').forEach(input => {
        const id = input.getAttribute('data-id');
        updateTotal(id);
    });
});

</script>
<script type="text/javascript">
    $(document).ready(function() {
        // Handle the deletion of a cart item
        $('.close_button').on('click', function() {
            let cartId = $(this).data('id');
            let row = $(this).closest('tr.product-box-contain');

            $.ajax({
                url: '{{ route('cart.delete.item') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cart_id: cartId
                },
                success: function(response) {
                    if (response.success) {
                        // Remove the row from the DOM
                        row.remove();
                        // Update the total price
                        updateCartTotal();
                    } else {
                        alert(response.message);
                    }
                }
            });
        });

        // Function to recalculate the total cart price
        const updateCartTotal = () => {
            let cartTotal = 0;

            $('.total').each(function() {
                cartTotal += parseFloat($(this).text().replace(/[^\d.-]/g, ''));
            });

            // Update the total price without decimal places
            $('.total_price').text(`${Math.round(cartTotal)}`);
        }
    });
</script>
@endpush
