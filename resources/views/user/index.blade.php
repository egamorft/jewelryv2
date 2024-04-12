<!doctype html>
<html lang="vi">

<head>
    <meta name="google-site-verification" content="googleeacc2166ce777ac3.html"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/images/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/images/logo.png') }}" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('style_page')
</head>

<body>

@include('user.partials.header')
<main class="main">
    @yield('content')
</main>
@include('user.partials.footer')

{{-- add attribute cart --}}
<div class="offcanvas offcanvas-end box-offcanvas-attribute" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body ">
        <div class="box-attribute">

        </div>
        <div class="box-cart-attribute">

        </div>
        <div class="footer-box-attr-sp">

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script_page')
<script src="{{ asset('assets/js/main.js') }}"></script>

{{-- CART --}}
<script>
    //Update cart quantity onload
    getCart(function (cartItems) {
        $('.point-cart').html(cartItems.length);
    });

    //Add specific product to cart
    function addToCart(id) {
        var formData = new FormData();
        formData.append('product_id', id);
        $.ajax({
            url: '{{ route('cart.store') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': `{{ csrf_token() }}`
            },
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.error == 0) {
                    toastr.success(response.message);
                    //Update cart icon
                    getCart(function (cartItems) {
                        $('.point-cart').html(cartItems.length);
                    });
                }
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    }

    //Get cart details
    function getCart(callback) {
        $.ajax({
            url: '{{ route('cart.index') }}',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': `{{ csrf_token() }}`
            },
            success: function (response) {
                if (response.error == 0) {
                    callback(response.data);
                }
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            }
        });
    }

    //Reload sidebar cart data
    function reloadSideBarCart() {
        var today = new Date(); // Get the current date
        getCart(function (cartItems) {
            $('.point-cart').html(cartItems.length);
            $('#cartUl').empty();
            var subTotal = 0;
            $.each(cartItems, function (index, cartItem) {
                var discountEnd = new Date(cartItem.discount_end);
                var listItem = $('<li>').addClass(
                    'list-group-item d-flex justify-content-between align-items-center'
                ).attr("id", "cartItem-" + cartItem.id);
                var itemContent = $('<div>');
                var itemName = $('<h6>').addClass('fs-5').text(cartItem.name);

                var quantityWrapper = $('<div>').addClass(
                    'd-flex align-items-center');
                var decreaseBtn = $('<a data-value-id="' + cartItem.value_id + '">').addClass('btn btn-sm me-2 decreaseBtn').text(
                    '-');
                var quantitySpan = $('<span>').addClass('fs-5 quantitySpan').text(cartItem
                    .quantity);
                var increaseBtn = $('<a data-value-id="' + cartItem.value_id + '">').addClass('btn btn-sm ms-2 increaseBtn').text(
                    '+');

                if (cartItem.discount > 0 && discountEnd > today) {
                    if (cartItem.discount_type == 'percent') {
                        var salePrice = cartItem.price - (cartItem.price * cartItem
                            .discount / 100);
                    } else {
                        var salePrice = cartItem.price - cartItem.discount;
                    }
                    subTotal += (salePrice +cartItem.total_money)* cartItem.quantity;
                    var formattedSalePrice = ((salePrice +cartItem.total_money)* cartItem.quantity).toLocaleString('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    });
                    var itemPrice = $('<p>').addClass('mb-0 fs-5 itemPrice').text(
                        formattedSalePrice);
                } else {
                    subTotal += (cartItem.price +cartItem.total_money)* cartItem.quantity;
                    var formattedPrice = ((cartItem.price +cartItem.total_money)* cartItem.quantity).toLocaleString('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    });
                    var itemPrice = $('<p>').addClass('mb-0 fs-5 itemPrice').text(
                        formattedPrice);
                }

                quantityWrapper.append(decreaseBtn, quantitySpan, increaseBtn);
                itemContent.append(itemName, quantityWrapper, itemPrice);

                var imageWrapper = $('<div>').addClass('position-relative');
                var removeBtn = $('<button data-value-id="' + cartItem.value_id + '">').addClass(
                    'btn btn-sm position-absolute top-0 end-0 removeCartBtn')
                    .html(
                        '<i class="fas fa-times"></i>');
                var itemImage = $('<img>').attr('src', cartItem.thumbnail)
                    .attr('alt', cartItem.name)
                    .addClass('img-fluid')
                    .css('width', '80px');

                imageWrapper.append(removeBtn, itemImage);

                listItem.append(itemContent, imageWrapper);
                $('#cartUl').append(listItem);
            });

            var formattedSubTotal = subTotal.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
            $('#cartSubTotal').text(formattedSubTotal);
        });
    }
</script>
<script>
    $(document).ready(function () {
        $('#offcanvasCart').on('shown.bs.offcanvas', function () {
            reloadSideBarCart();
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(document).on("click", ".removeCartBtn", function () {
            var parentLi = $(this).closest("li");
            var parentLiId = parentLi.attr("id");
            var productId = parentLiId.split("-")[1];
            var value_id = $(this).attr('data-value-id');

            $.ajax({
                url: '{{ route('cart.remove') }}',
                type: 'POST',
                data: {
                    product_id: productId,
                    value_id: value_id
                },
                headers: {
                    'X-CSRF-TOKEN': `{{ csrf_token() }}`
                },
                success: function (response) {
                    if (response.error == 0) {
                        toastr.success(response.message);
                        reloadSideBarCart();
                    }
                },
                error: function (xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                }
            });

        });

        //Handle cart quantity update
        $(document).on('click', '.increaseBtn', increaseQuantity);
        $(document).on('click', '.decreaseBtn', decreaseQuantity);

        function increaseQuantity() {
            var quantitySpan = $(this).siblings('.quantitySpan');
            var cartItemId = $(this).closest('li').attr('id').replace('cartItem-', '');
            var quantity = parseInt(quantitySpan.text());
            var value_id = $(this).attr('data-value-id');
            quantity++;

            updateCartQuantity(cartItemId, quantity, value_id);
        }

        function decreaseQuantity() {
            var quantitySpan = $(this).siblings('.quantitySpan');
            var cartItemId = $(this).closest('li').attr('id').replace('cartItem-', '');
            var quantity = parseInt(quantitySpan.text());
            var value_id = $(this).attr('data-value-id');
            if (quantity > 1) {
                quantity--;

                // Call your updateCartQuantity function or perform the desired action here
                updateCartQuantity(cartItemId, quantity, value_id);
            }
        }

        //Update cart quantity
        function updateCartQuantity(itemId, quantity, value_id) {
            $.ajax({
                url: '{{ route('cart.update') }}',
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': `{{ csrf_token() }}`
                },
                data: {
                    product_id: itemId,
                    quantity: quantity,
                    value_id: value_id
                },
                success: function (response) {
                    if (response.error == 0) {
                        reloadSideBarCart();
                    }
                },
                error: function (xhr, status, error) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        }
    });
</script>

<script>
    function toggleChildCategories(parentId) {
        // Hide all child categories
        $('[id^="childCategories_"]').hide();

        // Show the selected child category
        $('#childCategories_' + parentId).show();

        // Hide all categories
        $('.categoryThumbnail').hide();

        // Show the selected category
        $('#category_thumbnail_' + parentId).show();
    }
</script>
</body>

</html>
