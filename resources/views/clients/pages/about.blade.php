@extends('clients.layouts.app')
@section('app')
    <section id="page-header" class="about-header">
        <h2>#KnowUs</h2>
        <p>Lorem ipsum dolor sit amet, consectertur</p>
    </section>
    <section id="about-head" class="section-p1">
        <img src="{{ asset('assets/imgs/about/a6.jpg')  }}" alt="">
        <div>
            <h2>Who We Are</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labories nisi ut
                aliquiip ex ea commodo consequat. Duis auteirure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat cuupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum</p>
            <abbr title="">
                Create stunning images with as much or litter control as you like thanks to a choice of Basic and
                Creative modes
            </abbr>
            <br> <br>

            <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">Create stunning images with as much or
                litter control as you like thanks to a choice of Basic and Creative modes
            </marquee>
        </div>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f1.png')  }}" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f2.png')  }}" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f3.png')  }}" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f4.png')  }}" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f5.png')  }}" alt="">
            <h6>Happy sell</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('assets/imgs/features/f6.png')  }}" alt="">
            <h6>F24/7 Support</h6>
        </div>
    </section>
    @include('clients.layouts.form-feedback')
@endsection
