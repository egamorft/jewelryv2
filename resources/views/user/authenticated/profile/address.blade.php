@extends('user.authenticated.profile.layouts.profile')

@section('my-shop-content')
    <div id="drmvsn-basic-container">
        <div class="title-area flex justify-between">
            <span class="mobile-only go-back"></span>
            <h2>DELIVERY ADDRESS MANAGEMENT</h2>
            <a href="{{ route('profile.delivery.register.address') }}" class="btn prior-1 desktop-only">Add delivery
                address</a>
        </div>


        <form id="frmAddr" name="" action="" method="post" enctype="multipart/form-data">
            <div class="xans-element- xans-myshop xans-myshop-addrlist">
                <div class="list-title">
                    <h4>Delivery address list</h4>
                </div>
                <div class=" addr-list mt-20 m-mb-40">
                    @forelse ($addresses as $add)
                        <div class="addr-item py-20 xans-record" id="address-record-{{ $add->id }}">
                            <div class="addr-title flex align-center justify-between">
                                <div class="title font-bold"><span>{{ $add->address }}</span></div>
                                <div class="default-addr ">{{ $add->isDefault ? 'Default address' : '' }}</div>
                            </div>
                            <div class="addr-info flex justify-between mt-10">
                                <div class="left">
                                    <div class="name-phone flex align-center">
                                        <div class="name"><span>{{ $add->first_name . ' ' . $add->last_name }}</span>
                                        </div>
                                        <div class="phone ml-10"><span>{{ $add->phone }}</span></div>
                                    </div>
                                    <div class="addr mt-10">
                                        <div class="addr-1">
                                            <span>{{ $add->country . ' - ' . $add->city . ' - ' . $add->region }}</span>
                                        </div>
                                        <div class="addr-2 mt-10"><span></span></div>
                                    </div>
                                </div>
                                <div class="right mt-auto">
                                    <div class="btns flex align-center gap-20">
                                        <a href="{{ route('profile.delivery.show.address', ['id' => $add->id]) }}"
                                            class="is-padded prior-2">
                                            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z"
                                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M21 21H12" stroke="#000000" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </a>
                                        @if (!$add->isDefault)
                                            <a type="button" onclick="deleteAddress({{ $add->id }})"
                                                class="is-padded prior-2">
                                                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M14 10V17M10 10V17"
                                                            stroke="#e12d2d" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="ec-base-button justify-between mobile-only">
                    <div class="flex justify-center flex-col align-center pt-0 pb-40">
                        <a href="{{ route('profile.delivery.register.address') }}" class="px-10 py-10 line-height-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                <path d="M20.75,14.683H14.683V20.75H12.817V14.683H6.75V12.817h6.067V6.75h1.867v6.067H20.75Z"
                                    transform="translate(-6.75 -6.75)"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('pages_script')
    <script>
        function deleteAddress(id) {
            var addressDiv = $('#address-record-' + id);
            if (confirm("Are you sure you want to delete this address?")) {
                $.ajax({
                    url: '{{ route('profile.delivery.destroy.address', ':id') }}'.replace(':id', id),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': `{{ csrf_token() }}`
                    },
                    success: function(response) {
                        if (response.error == 0) {
                            toastr.success(response.message);
                            addressDiv.remove();
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
