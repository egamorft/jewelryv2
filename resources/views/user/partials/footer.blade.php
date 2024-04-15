<div class="box-footer">
    <div class="item-footer-col">
        <p class="title-footer">DONA&D.</p>
        <div class="content-footer">
            Donna Company Co., Ltd.
            5th and 6th floors, 37 Hannam-daero 20-gil, Yongsan-gu, Seoul (Hannam-dong)
            Business registration number 869-86-00403
            Mail order number 2023-Seoul Yongsan-0514
            Personal information management and protection responsibility  Miho Park
            CEO Park Mi-ho
        </div>
        <div class="mt-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                style="margin-right: 10px;">
                <path
                    d="M12,0C8.74,0,8.333.015,7.053.072A8.849,8.849,0,0,0,4.14.63,5.876,5.876,0,0,0,2.014,2.014,5.855,5.855,0,0,0,.63,4.14,8.823,8.823,0,0,0,.072,7.053C.012,8.333,0,8.74,0,12s.015,3.667.072,4.947A8.854,8.854,0,0,0,.63,19.86a5.885,5.885,0,0,0,1.384,2.126A5.868,5.868,0,0,0,4.14,23.37a8.86,8.86,0,0,0,2.913.558C8.333,23.988,8.74,24,12,24s3.667-.015,4.947-.072a8.88,8.88,0,0,0,2.913-.558,6.133,6.133,0,0,0,3.51-3.51,8.854,8.854,0,0,0,.558-2.913C23.988,15.667,24,15.26,24,12s-.015-3.667-.072-4.947A8.875,8.875,0,0,0,23.37,4.14a5.89,5.89,0,0,0-1.384-2.126A5.847,5.847,0,0,0,19.86.63,8.828,8.828,0,0,0,16.947.072C15.667.012,15.26,0,12,0Zm0,2.16c3.2,0,3.585.016,4.85.071a6.611,6.611,0,0,1,2.227.415,3.949,3.949,0,0,1,2.278,2.277,6.625,6.625,0,0,1,.413,2.227c.057,1.266.07,1.646.07,4.85s-.015,3.585-.074,4.85a6.753,6.753,0,0,1-.421,2.227,3.81,3.81,0,0,1-.9,1.382,3.744,3.744,0,0,1-1.38.9,6.674,6.674,0,0,1-2.235.413c-1.274.057-1.649.07-4.859.07s-3.586-.015-4.859-.074a6.8,6.8,0,0,1-2.236-.421,3.716,3.716,0,0,1-1.379-.9,3.644,3.644,0,0,1-.9-1.38,6.81,6.81,0,0,1-.42-2.235c-.045-1.26-.061-1.649-.061-4.844s.016-3.586.061-4.861A6.8,6.8,0,0,1,2.6,4.89a3.557,3.557,0,0,1,.9-1.381,3.549,3.549,0,0,1,1.379-.9A6.642,6.642,0,0,1,7.1,2.19c1.275-.045,1.65-.06,4.859-.06L12,2.16Zm0,3.678A6.162,6.162,0,1,0,18.162,12,6.162,6.162,0,0,0,12,5.838ZM12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Zm7.846-10.4a1.44,1.44,0,1,1-1.44-1.439A1.441,1.441,0,0,1,19.846,5.595Z"
                    fill="#909090"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="31.994" height="24" viewBox="0 0 31.994 24">
                <path id="Icon_ionic-logo-youtube" data-name="Icon ionic-logo-youtube"
                    d="M31.786,9.8a4.858,4.858,0,0,0-4.625-5.075C23.7,4.562,20.168,4.5,16.562,4.5H15.437c-3.6,0-7.137.062-10.6.225A4.869,4.869,0,0,0,.219,9.812C.062,12.037-.006,14.262,0,16.487s.062,4.45.212,6.681a4.874,4.874,0,0,0,4.618,5.093c3.637.169,7.368.244,11.162.237q5.7.019,11.162-.237a4.875,4.875,0,0,0,4.625-5.093c.15-2.231.219-4.456.212-6.687Q32.011,13.143,31.786,9.8ZM12.937,22.618V10.337L22,16.474Z"
                    transform="translate(0 -4.5)" fill="#909090"></path>
            </svg>
        </div>
    </div>

    @foreach ($footerParentCategory as $cate)
        <div class="item-footer-col">
            <p class="title-footer">{{ $cate->name }}</p>

            @if (isset($footerChildrenCategories) && !empty($footerChildrenCategories))
                @foreach ($footerChildrenCategories as $parentId => $children)
                    @if (!empty($children))
                        @if ($parentId == $cate->id)
                            @foreach ($children as $child)
                                <a href="{{route('detail-blog',$child['id'])}}" class="content-footer">{{ $child['name'] }}</a>
                            @endforeach
                        @endif
                    @endif
                @endforeach
            @endif
        </div>
    @endforeach

    <div class="item-footer-col">
        <p class="title-footer">customer service center</p>
        <a class="link-footer">02-543-4047</a>
        <div class="content-footer">Monday - Friday 13:00 - 18:00 (Closed on Sundays and public holidays)
            dona_company@naver.com</div>
    </div>
    <div class="item-footer-col">
        <p class="title-footer">Hannam Showroom</p>
        <a class="link-footer">010-7275-4047</a>
        <div class="content-footer">Mon – Sun 13:00 – 20:00 (Closed on public holidays)
            37 Hannam-daero 20-gil, Yongsan-gu, Seoul 5F 6F</div>
    </div>
    <div class="item-footer-col">
        <p class="title-footer">bank information</p>
        <a class="link-footer">Shinhan Bank
            140-011-396427</a>
        <div class="content-footer">Shinhan Bank
            140-011-396427
            Depositor Donna Company Co., Ltd.</div>
    </div>
</div>

<div class="box-footer-mobile">
   <div class="link-footer-mobile" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuFooter" aria-controls="offcanvasMenuFooter">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14"><g transform="translate(2303 -886)"><g transform="translate(-2303 887)"><line x2="18" fill="none" stroke="#909090" stroke-width="2"></line><line x2="18" transform="translate(0 6)" fill="none" stroke="#909090" stroke-width="2"></line><line x2="18" transform="translate(0 12)" fill="none" stroke="#909090" stroke-width="2"></line></g></g></svg>
   </div>
      <a href="{{route('home')}}" class="link-footer-mobile">
         <svg xmlns="http://www.w3.org/2000/svg" width="21.338" height="18.345" viewBox="0 0 21.338 18.345"><g transform="translate(-10859.831 -1100.462)"><path d="M10945,1022.168l10-9,10,9" transform="translate(-84.5 88.64)" fill="none" stroke="#909090" stroke-width="2"></path><path d="M10947.5,1021v10h12v-10" transform="translate(-83.001 86.809)" fill="none" stroke="#909090" stroke-width="2"></path></g></svg>
      </a>
      <a href="{{ Auth::check() ? route('profile.interest') : route('auth.member.login') }}" class="link-footer-mobile">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16.619" viewBox="0 0 18 16.619"><g transform="translate(-213.188 -141.297)" fill="none" stroke-miterlimit="10"><path d="M226.238,141.3a5.32,5.32,0,0,0-4.05,1.9,5.321,5.321,0,0,0-4.05-1.9,4.893,4.893,0,0,0-4.951,4.836c0,.047,0,.1,0,.144,0,3.44,3.059,6.2,7.692,10.461l1.307,1.177,1.307-1.177c4.633-4.258,7.692-7.017,7.692-10.461a4.894,4.894,0,0,0-4.805-4.98C226.333,141.3,226.285,141.3,226.238,141.3Z" stroke="none"></path><path d="M 226.3093109130859 143.2972412109375 C 226.3014678955078 143.2972412109375 226.2936859130859 143.2973327636719 226.2859802246094 143.2975311279297 L 226.2463684082031 143.298095703125 C 225.2698516845703 143.3023071289062 224.3488006591797 143.734375 223.7193603515625 144.4834747314453 L 222.1881103515625 146.305908203125 L 220.6568756103516 144.4834442138672 C 220.0274810791016 143.7343597412109 219.1064605712891 143.3023071289062 218.1299591064453 143.298095703125 L 218.0803680419922 143.2977752685547 C 216.507080078125 143.2977752685547 215.2116088867188 144.5751495361328 215.1879730224609 146.1473846435547 C 215.1879577636719 146.1750183105469 215.1879119873047 146.2031402587891 215.1885681152344 146.2312469482422 L 215.1891174316406 146.2779541015625 C 215.1891174316406 148.7888031005859 217.9103851318359 151.2909393310547 222.029541015625 155.0783843994141 L 222.1881866455078 155.2242584228516 L 222.3426818847656 155.0822906494141 C 226.4642944335938 151.2955780029297 229.1871948242188 148.7939300537109 229.1871948242188 146.2779541015625 L 229.1875152587891 146.2421569824219 C 229.2013397216797 145.4696350097656 228.9133911132812 144.7378997802734 228.3766937255859 144.1817626953125 C 227.8399200439453 143.6255645751953 227.1187133789062 143.3116149902344 226.3459320068359 143.2977905273438 L 226.3346099853516 143.2975463867188 C 226.3261566162109 143.29736328125 226.3177032470703 143.2972412109375 226.3093109130859 143.2972412109375 M 226.3092956542969 141.2972564697266 C 226.3333435058594 141.2972564697266 226.3575286865234 141.2975311279297 226.3817138671875 141.2981109619141 C 229.0836791992188 141.3464660644531 231.2355651855469 143.5759735107422 231.1871948242188 146.2779541015625 C 231.1871948242188 149.7223205566406 228.128662109375 152.4816589355469 223.4952697753906 156.7393188476562 L 222.1881408691406 157.9159545898438 L 220.8810424804688 156.7393188476562 C 216.2476806640625 152.4782867431641 213.1891174316406 149.7178344726562 213.1891174316406 146.2779541015625 C 213.18798828125 146.2295837402344 213.18798828125 146.1812133789062 213.18798828125 146.1339569091797 C 213.2194976806641 143.4308776855469 215.4355773925781 141.2664489746094 218.1386108398438 141.2981109619141 C 219.7010498046875 141.3048553466797 221.1825256347656 142.0000152587891 222.1881408691406 143.1968841552734 C 223.1937866210938 142.0000152587891 224.6741333007812 141.3048553466797 226.2377319335938 141.2981109619141 C 226.2613525390625 141.2975311279297 226.2852630615234 141.2972564697266 226.3092956542969 141.2972564697266 Z" stroke="none" fill="#909090"></path></g></svg>
      </a>
</div>

{{-- menu footer --}}
<div class="offcanvas offcanvas-start start-menu-footer-mobile" tabindex="-1" id="offcanvasMenuFooter" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body px-0">
       <div class="accordion accordion-flush" id="accordionFlushExample">
          @if (isset($parentCategories) && !$parentCategories->isEmpty())
             @foreach ($parentCategories as $index => $cate)
                <div class="accordion-item border-0">
                <h2 class="accordion-header" id="flush-heading{{$index}}">
                   <button class="accordion-button collapsed btn-menu-big" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$index}}" aria-expanded="false" aria-controls="flush-collapse{{$index}}">
                      {{ strtoupper($cate->name) }}
                   </button>
                </h2>
                @if (isset($childrenCategories) && !empty($childrenCategories))
                   <div id="flush-collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$index}}" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body d-block">
                         @foreach ($childrenCategories as $parentId => $children)
                            @if (!empty($children))
                               @foreach ($children as $child)
                                  @if($parentId == $cate->id)
                                     <a href="{{ route('categories.show', ['slug' => $child['slug']]) }}"
                                        class="content-item-menu">{{ strtoupper($child['name']) }}</a>
                                  @endif
                               @endforeach
                            @endif
                         @endforeach
                         @foreach ($parentCategories as $key => $cate)
                            @if($key == $index)
                               <img src="{{ $cate->thumbnail }}" class="w-100">
                            @endif
                         @endforeach
                      </div>
                   </div>
                @endif
                </div>
             @endforeach
          @endif
        </div>
 
    </div>
  </div>