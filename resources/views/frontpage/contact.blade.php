@extends('layouts.frontend.app2')


@section('content')

<section id="training">
    <div id="emp-contact" class="separador2 parallaxie"  style='background: url("/images/Banner-Quote2-Cambios01.png")'>
        <div class="container">


            <div class="row banner">
                <div class="col-md-3 d-none d-sm-block ">
                    <div class="logo">
                        <img src="/images/Logo-TAP.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <p>GET A <br><span>QUOTE</span></p>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="contacto" class="separador2">
    <div class="container">

        <div class="card">
            <div class="card-body paddincard sombra">



                <div class="row justify-content-center">
                    <div class="col-md-3 text-center">
                        <img src="/images/Emblema-blanco.png" class="img-fluid">
                    </div>
                </div>



                    <div class="row justify-content-center">
                        <div class="col-md-12 titlesection text-center">
                            <h2 class="tituloblack">CONTACT</h2>
                            <P>We are grateful for the opportunity to earn your business.</P>
                        </div>
                    </div>


                <div class="row justify-content-center">
                    <div class="col-md-12">

                        <form id="form__contact" action="{{route('front.contactgracias')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                        <label for="name"> Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="Name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                        <label for="phone"> Phone</label>
                                        <input id="phone"  type="tel" aria-describedby="phoneHelp" maxlength="12" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="Phone" autofocus>
                                        <small class="form-text text-muted">Format: 123-456-7890</small>
                                        @error('phone')
                                            <span id="phoneHelp" class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                        <label for="email"> Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="Email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group ">
                                        <label for="message"> Message</label>
                                        <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" required autocomplete="Message" >{{ old('message') }}</textarea>

                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                    </div>




                                    <div class="col-md-4 text-center">
                                        <input type="hidden" name="origen" value="contact">


                                        <button type="submit"
                                        data-sitekey="6Lcp-V0qAAAAAK-IZoSfefYdRjT4Gbdn47XJkD7d"
                                        data-callback='onFormContact'
                                        data-action='submit' class="g-recaptcha btn btn-danger btn-medium">Submit</button>
                                    </div>

                                </div>

                            </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<section id="bldireccion">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 bloque">
                <h3>VISIT US</h3>

                <p>11503 Jones Maltsberger Rd, Ste 1101<br>
                    San Antonio, TX 78216</p>

                  <p>  E-mail: admin@txassetpro.com<br>
                    Tel: (210) 399-1116</p>
            </div>
        </div>
    </div>
</section>

<section id="mapa" style="height:700px;">

</section>

@endsection
