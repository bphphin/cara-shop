@extends('clients.layouts.app')
@section('app')
    <section id="page-header" class="about-header">     
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
    
    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fa-solid fa-map"></i>
                    <p>56 Glassford Street Glasgow G1 1UL New York</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>Contact@example.com</p>
                </li>
                <li>
                    <i class="fa-solid fa-phone"></i>
                    <p>Contact@example.com</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday:9.00am to 16pm</p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.89781530608!2d105.83250681485454!3d21.036774285994067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aba15ec15d17%3A0x620e85c2cfe14d4c!2zTMSDbmcgQ2jhu6cgdOG7i2NoIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2sus!4v1660815553469!5m2!1svi!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="form-details" class="section-p1">
        <form action="">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name" required>
            <input type="text" placeholder="E-mail" required>
            <input type="text" placeholder="Subject" required>
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal">Submit</button>
        </form>
        <div class="people">
            <div>
                <img src="{{ asset('assets/imgs/people/1.png')  }}" alt="">
                <p><span>John Doe</span> Senior Marketing Manager <br> Phone: +000 123 000 77 88 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="{{ asset('assets/imgs/people/2.png')  }}" alt="">
                <p><span>William Smith</span> Senior Marketing Manager <br> Phone: +000 123 000 77 88 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="{{ asset('assets/imgs/people/3.png')  }}" alt="">
                <p><span>Emma Stone</span> Senior Marketing Manager <br> Phone: +000 123 000 77 88 <br> Email: contact@example.com</p>
            </div>
        </div>
    </section>

    @include('clients.layouts.form-feedback')
@endsection
