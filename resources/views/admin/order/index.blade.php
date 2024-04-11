@extends('admin.layout.index')
@section('title', 'Order list')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
@endsection

@section('main')
    <main id="main" class="main d-flex flex-column justify-content-center">
        <div class="">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Order list</h1>
            <hr>

            {{-- <div class="d-flex justify-content-start">
                <a href="{{ route('admin.product.create') }}" type="button" class="btn btn-outline-primary"><i
                        class="fa-solid fa-rotate"></i>Add more product</a>
            </div> --}}

            <table class="table" id="tableListOrders">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Tracking code</th>
                        <th scope="col" class="text-center">Contact email</th>
                        <th scope="col" class="text-center">Shipping name</th>
                        <th scope="col" class="text-center">Address</th>
                        <th scope="col" class="text-center">Phone</th>
                        <th scope="col" class="text-center">Payment method</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $ord)
                        <tr id="order-{{ $ord->id }}">
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">
                                {{ $ord->tracking_code }}
                            </td>
                            <td class="text-center">
                                {{ $ord->contact_email }}
                            </td>
                            @php
                                $address = json_decode($ord->shipping_address);
                            @endphp
                            <td class="text-center">
                                {{ $address->first_name . ' ' . $address->last_name }}
                            </td>
                            <td class="text-center">
                                {{ $address->address }}
                            </td>
                            <td class="text-center">
                                {{ $address->phone }}
                            </td>
                            <td class="text-center">
                                {{ $ord->payment_method }}
                            </td>
                            <td class="text-center">
                                {{ number_format($ord->total, 0, '.', ',') }} đ
                            </td>
                            @php
                                switch ($ord->status) {
                                    case \App\Enums\OrderStatus::BEFORE_DEPOSIT:
                                        $badge = 'secondary';
                                        break;
                                    case \App\Enums\OrderStatus::PREPARE_DELIVERY:
                                        $badge = 'primary';
                                        break;
                                    case \App\Enums\OrderStatus::SHIPPING:
                                        $badge = 'info text-dark';
                                        break;
                                    case \App\Enums\OrderStatus::COMPLETED:
                                        $badge = 'success';
                                        break;
                                    case \App\Enums\OrderStatus::CANCEL:
                                        $badge = 'danger';
                                        break;
                                    case \App\Enums\OrderStatus::EXCHANGE:
                                        $badge = 'warning text-dark';
                                        break;
                                    case \App\Enums\OrderStatus::RETURN:
                                        $badge = 'dark';
                                        break;
                                    default:
                                        $badge = 'secondary';
                                        break;
                                }
                            @endphp
                            <td class="text-center">
                                <span class="badge rounded-pill bg-{{ $badge }}">
                                    {{ \App\Enums\OrderStatus::getKey($ord->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.order.edit', ['id' => $ord->id]) }}"
                                    class="btn btn-primary me-3"><i class="bi bi-pencil-square"></i></a>
                                <button onclick="deleteOrder({{ $ord->id }})" class="btn btn-danger"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableListOrders').DataTable();
        });
    </script>
    <script>
        function deleteOrder(id) {
            var orderTr = $('#order-' + id);
            if (confirm("Are you sure you want to delete this order?")) {
                $.ajax({
                    url: '{{ route('admin.order.destroy', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            orderTr.remove();
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message);
                    }
                });
            }
        }
    </script>
@endsection
