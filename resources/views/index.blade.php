<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="">
    @include('partials.nav')
    <div class="main">
        @yield('main')
    </div>
    @include('partials.footer')
    {{-- modal 3 with x btn --}}
<dialog id="my_modal_3" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
   <div class="modal3">
    @include('partials.reviewForm')
   </div>
  </div>
</dialog>
    {{-- jquery cdn --}}
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>
    <script>
        //   nav togel
        $(document).on('click','.ham',function(){
            $('.ham-list').toggleClass('hidden')
        })
        $(document).on('click','.filter-btn',function(){
            $('.filters').toggleClass('hidden')
        })
        // stop scroll 
        $('.ham-list').on('wheel touchmove', function (e) {
    e.preventDefault();
});
        // search
        let searchTimer;
        // on search page load
        $(document).ready(function() {
            let query = new URLSearchParams(window.location.search).get('query');

            if (query) {
                $.ajax({
                    url: '/search',
                    type: 'GET',
                    data: {
                        query
                    },

                    beforeSend: function() {
                        $('.search-products').html('<p>Loading...</p>');
                    },

                    success: function(res) {
                        $('.search-products').html(res);
                    }
                });
            }
        });
        // on search input
        $('.searchbar').on('input', async function() {
            let query = $(this).val()
            if (query.length > 0 && window.location.pathname !== '/search') {
                window.location.href = '/search?query=' + encodeURIComponent(query)
                return;
            }
            if (query.length === 0) {
                window.location.href = '/';
                return;
            }
            clearTimeout(searchTimer)
            searchTimer = setTimeout(() => {
                console.log(query);
                $.ajax({
                    url: '/search',
                    type: 'GET',
                    data: {
                        query
                    },
                    beforeSend: function() {
                        $('.search-products').html('<p>Loading...</p>');
                    },
                    success: function(res) {
                        $('.search-products').html(res)
                    }
                })
            }, 500)
        })

        // load cart modals at cart page



        // let cartQty = parseInt($('.cartQty').val())
        let timer;
        $(document).on('click', '.decreaseQty', function(e) {
            e.preventDefault()
            let cartQty = parseInt($(this).siblings('.cartQty').val()) || 0
            if (cartQty > 1) {
                cartQty--
                $(this).siblings('.cartQty').val(cartQty)
                let id = $(this).data('id')
                console.log(id)

                increaseDecreaseQty(300, cartQty, id)
            }
        })
        $(document).on('click', '.increaseQty', function(e) {
            e.preventDefault()
            let cartQty = parseInt($(this).siblings('.cartQty').val()) || 0
            cartQty++
            $(this).siblings('.cartQty').val(cartQty)
            let id = $(this).data('id')
            increaseDecreaseQty(300, cartQty, id)
        })

        function increaseDecreaseQty(time, qty, id) {
            clearTimeout(timer)
            timer = setTimeout(() => {
                $.ajax({
                    url: '/cart/updateQty',
                    type: 'GET',
                    data: {
                        qty,
                        id
                    },
                    success: function(res) {
                        alert(res.cartCount);
                        $('.cart-count').text(res.cartCount)
                    }
                })
            }, time)
        }
        // cart btn click
        $(document).on('click', '.cart-btn', function() {
            if ({{auth()->guard('web')->check() ? 'true' : 'false'}} === false) {
                alert('Please login to add products to cart!');
                return;
            }
            const productId = $(this).data('id');
            let cartCountElem = $('.cart-count');
            $.ajax({
                url: '/cart/add',
                method: 'POST',
                data: {
                    product_id: productId
                },
                success: function(response) {
                    cartCountElem.text(response.cartCount);
                    alert('Product added to cart!');
                },

            })
        });
    </script>
    @yield('scripts')

</body>

</html>
