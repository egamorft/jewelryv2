@extends('admin.layout.index')
@section('title', 'Edit order')

@section('style')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/order-admin.css') }}">
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit order <strong>{{ $order->tracking_code }}</strong></h1>
            <hr>
            <div class="container">
                @php
                    $step1 = in_array($order->status, [
                        \App\Enums\OrderStatus::BEFORE_DEPOSIT,
                        \App\Enums\OrderStatus::PREPARE_DELIVERY,
                        \App\Enums\OrderStatus::SHIPPING,
                        \App\Enums\OrderStatus::COMPLETED,
                    ]);
                    $step2 = in_array($order->status, [
                        \App\Enums\OrderStatus::PREPARE_DELIVERY,
                        \App\Enums\OrderStatus::SHIPPING,
                        \App\Enums\OrderStatus::COMPLETED,
                    ]);
                    $step3 = in_array($order->status, [
                        \App\Enums\OrderStatus::SHIPPING,
                        \App\Enums\OrderStatus::COMPLETED,
                    ]);
                    $step4 = $order->status === \App\Enums\OrderStatus::COMPLETED;
                    $step5 = $order->status === \App\Enums\OrderStatus::CANCEL;
                    $step6 = $order->status === \App\Enums\OrderStatus::EXCHANGE;
                    $step7 = $order->status === \App\Enums\OrderStatus::RETURN;
                @endphp

                <div class="track">
                    <div {{ $order->status == \App\Enums\OrderStatus::BEFORE_DEPOSIT ? '' : 'type=button' }}
                        data-status="{{ \App\Enums\OrderStatus::BEFORE_DEPOSIT }}"
                        class="{{ $order->status == \App\Enums\OrderStatus::BEFORE_DEPOSIT ? '' : 'statusTrackingBtn' }} step {{ $step1 ? 'active' : '' }}">
                        <span class="icon">
                            <i class="fa fa-check"></i>
                        </span>
                        <span class="text">
                            Before deposit
                        </span>
                    </div>
                    <div {{ $order->status == \App\Enums\OrderStatus::PREPARE_DELIVERY ? '' : 'type=button' }}
                        data-status="{{ \App\Enums\OrderStatus::PREPARE_DELIVERY }}"
                        class="{{ $order->status == \App\Enums\OrderStatus::PREPARE_DELIVERY ? '' : 'statusTrackingBtn' }} step {{ $step2 ? 'active' : '' }}">
                        <span class="icon">
                            <i class="fa fa-clipboard-list"></i>
                        </span>
                        <span class="text">
                            Prepare delivery
                        </span>
                    </div>
                    <div {{ $order->status == \App\Enums\OrderStatus::SHIPPING ? '' : 'type=button' }}
                        data-status="{{ \App\Enums\OrderStatus::SHIPPING }}"
                        class="{{ $order->status == \App\Enums\OrderStatus::SHIPPING ? '' : 'statusTrackingBtn' }} step {{ $step3 ? 'active' : '' }}">
                        <span class="icon">
                            <i class="fa fa-truck"></i>
                        </span>
                        <span class="text">
                            Shipping
                        </span>
                    </div>
                    <div {{ $order->status == \App\Enums\OrderStatus::COMPLETED ? '' : 'type=button' }}
                        data-status="{{ \App\Enums\OrderStatus::COMPLETED }}"
                        class="{{ $order->status == \App\Enums\OrderStatus::COMPLETED ? '' : 'statusTrackingBtn' }} step {{ $step4 ? 'active' : '' }}">
                        <span class="icon">
                            <i class="fa fa-box"></i>
                        </span>
                        <span class="text">
                            Completed
                        </span>
                    </div>
                    <div {{ $order->status == \App\Enums\OrderStatus::CANCEL ? '' : 'type=button' }}
                        data-status="{{ \App\Enums\OrderStatus::CANCEL }}"
                        class="{{ $order->status == \App\Enums\OrderStatus::CANCEL ? '' : 'statusTrackingBtn' }} step {{ $step5 ? 'inactive' : '' }}">
                        <span class="icon">
                            <i class="fa fa-xmark"></i>
                        </span>
                        <span class="text">
                            Cancel
                        </span>
                    </div>
                    <div {{ $order->status == \App\Enums\OrderStatus::EXCHANGE ? '' : 'type=button' }}
                        data-status="{{ \App\Enums\OrderStatus::EXCHANGE }}"
                        class="{{ $order->status == \App\Enums\OrderStatus::EXCHANGE ? '' : 'statusTrackingBtn' }} step {{ $step6 ? 'inactive' : '' }}">
                        <span class="icon">
                            <i class="fa fa-rotate"></i>
                        </span>
                        <span class="text">
                            Exchange
                        </span>
                    </div>
                    <div {{ $order->status == \App\Enums\OrderStatus::RETURN ? '' : 'type=button' }}
                        data-status="{{ \App\Enums\OrderStatus::RETURN }}"
                        class="{{ $order->status == \App\Enums\OrderStatus::RETURN ? '' : 'statusTrackingBtn' }} step {{ $step7 ? 'inactive' : '' }}">
                        <span class="icon">
                            <i class="fa fa-arrow-rotate-left"></i>
                        </span>
                        <span class="text">
                            Return
                        </span>
                    </div>
                </div>

                <div class="card">
                    <div class="d-flex justify-content-between my-2 fw-bolder">
                        @php
                            $address = json_decode($order->shipping_address);
                        @endphp
                        <div class="p-3">
                            <p>Contact email: {{ $order->contact_email }}</p>
                            <p>Shipping name: {{ $address->first_name . ' ' . $address->last_name }}</p>
                            <p>Address: {{ $address->address }}</p>
                            <p>Phone: {{ $address->phone }}</p>
                        </div>
                        <div class="p-3">
                            <p>Order date: {{ date('d/m/Y H:i:s', strtotime($order->created_at)) }}</p>
                        </div>
                        <div class="p-3">
                            <p>Payment method: {{ strtoupper($order->payment_method) }}</p>
                            <p>Subtotal: {{ number_format($order->subtotal, 0, '.', ',') }} đ</p>
                            <p>Discount: {{ number_format($order->discount, 0, '.', ',') }} đ</p>
                            <p>Total: {{ number_format($order->total, 0, '.', ',') }} đ</p>
                        </div>
                    </div>
                    <hr class="mx-4">
                    @foreach ($order->orderDetails as $key => $detail)
                        <div class="container mb-2 {{ $key != 0 ? 'more-content' : '' }}"
                            style="{{ $key != 0 ? 'display: none;' : '' }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>{{ $detail->product_name }}</p>
                                    <img src="{{ $detail->products->thumbnail_img }}" class="img-thumbnail mt-2"
                                        alt="" width="160px">
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <p>Quantity: {{ $detail->quantity }}</p>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end">
                                    <p>{{ number_format($detail->price * $detail->quantity, 0, '.', ',') }} đ</p>
                                </div>
                            </div>
                        </div>
                        <hr class="mx-2">
                    @endforeach
                    @if (count($order->orderDetails) > 1)
                        <div class="d-flex justify-content-center">
                            <a type="button" class="show-more text-muted">Show more
                                <span class="fa fa-angle-down"></span></a>
                        </div>
                        <hr class="mx-2">
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#categorySelector').select2({
                theme: 'bootstrap-5',
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.show-more').on('click', function() {
                var showMoreBtn = $(this);
                var moreContent = showMoreBtn.closest('.card').find('.more-content');

                if (moreContent.is(':hidden')) {
                    moreContent.slideDown('fast');
                    showMoreBtn.find('span').removeClass('fa-angle-down').addClass('fa-angle-up');
                } else {
                    moreContent.slideUp('fast');
                    showMoreBtn.find('span').removeClass('fa-angle-up').addClass('fa-angle-down');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.statusTrackingBtn').on('click', function() {
                var trackingStatus = $(this).data('status');

                if (confirm('You want to change order status?')) {
                    $.ajax({
                        url: '{{ route('admin.order.update', ['id' => $order->id]) }}',
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': `{{ csrf_token() }}`
                        },
                        data: {
                            'status': trackingStatus
                        },
                        success: function(response) {
                            if (response.error == 0) {
                                toastr.success(response.message);
                                // Delayed page reload after 1 seconds
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }
                        },
                        error: function(xhr, status, error) {
                            toastr.error(xhr.responseJSON.message);
                        }
                    });

                }
            });
        });
    </script>
@endsection
