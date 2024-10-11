@extends('layouts.frontend.app2')


@section('content')

<section id="employment">
    <div id="emp-inicio" class="separador2 parallaxie"  style='background: url("/images/Recruitment_Video.gif")'>
        <div class="container">


            <div class="row banner">
                    <div class="col-md-3 d-none d-sm-block">
                        <div class="logo">
                            <img src="/images/Logo-TAP.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p>JOIN THE<BR><span>TAP</span> TEAM</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="sectiongray separador2">
       <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="titulosimbolo">simbolo</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>We are a fast growing business and always accepting applications.</h2>
                <p>Feel free to come by the office at 11503 Jones Maltsberger Rd, Ste. 1101 or email Alicia Morales your resume at  admin@txassetpro.com</p>

                <a href="#frm-contenido" class="btn btn-danger btn-medium shadowred">APPLY NOW</a>
                <a href="/form8850" class="btn btn-danger btn-medium shadowred btn__separacion">FORM 8850</a>
            </div>
        </div>
       </div>
    </div>
</section>
<section id="frm-contenido" class="separador2">
    <div class="container application">
        <div class="card">

                <div class="card-body appliend sombra">


                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                                <h1>APPLICANT INFORMATION</h1>
                            </div>
                        </div>

                    </div>

            <form class="form" action="{{route('front.thanks')}}" method="POST"  id="form-employment" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                <div class="lienzo">
                   @include('layouts.frontend.partials.form.information')
                </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                            <h1>Education and Training</h1>
                            </div>
                        </div>
                    </div>

                <!--start-->

                    <div class="lienzo">


                     @include('layouts.frontend.partials.form.education')

                    </div>
                    <!--end-->



                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                            <h1>References</h1>
                            </div>
                        </div>
                    </div>

                <div class="lienzo">
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form">
                                    <p>Please list three professional references.  </p>
                                </div>
                            </div>

                            @include('layouts.frontend.partials.form.reference')
                    </div>


                </div>


                <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                            <h1>Previous Employment</h1>
                            </div>
                        </div>
                </div>

                <div class="lienzo">
                    @include('layouts.frontend.partials.form.previous')

                </div>



                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="linebox">
                            <h1>Military Service</h1>
                        </div>
                    </div>
                </div>

                <div class="lienzo">
                    @include('layouts.frontend.partials.form.military')
                </div>



                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                                <h1>Disclaimer and Signature</h1>
                            </div>
                        </div>
                    </div>

                    <div class="lienzo mb-5">


                        <div class="col-md-12">
                        <p>I certify that my answers are true and complete to the best of my knowledge. If this application leads to employment, I understand that false or misleading information in my application or interview may result in my release.</p>
                        </div>
                        <div class="form-row">

                            <div class="col-md-12">
                                <legend class="col-form-label etiqueta"> Attach Id</legend>
                                <input id="fileid" name="fileid[]" type="file" multiple>


                            </div>
                            <div class="col-md-4">
                                 <legend class="col-form-label etiqueta"> Signature *</legend>
                                 <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="text" name="signature" id="signature" class="form-control" placeholder="Signature" required>
                                </div>
                            </div>
                            </div>


                            <div class="col-md-4">

                                 <div class="form-row">

                            </div>
                            </div>


                            <div class="col-md-4">
                                 <legend class="col-form-label etiqueta"> Date * </legend>
                                 <div class="form-row">
                                <div class="form-group col-md-12 col-12">

                                    <input type="date" name="datedisclamer" id="datedisclamer" class="form-control" placeholder="Date" required>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>





                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            {{-- <button type="submit" id="form-employment"  class="btn btn-danger btn-medium btn-employment-submit" >SUBMIT</button> --}}

                            <button type="submit" id="form-employment"
                            data-sitekey="6Lcp-V0qAAAAAK-IZoSfefYdRjT4Gbdn47XJkD7d"
                            data-callback='onSubmit'
                            data-action='submit' class=" g-recaptcha btn btn-danger btn-medium btn-employment-submit">SUBMIT</button>
                        </div>
                    </div>
                   </form>
                </div>

        </div>
    </div>
</section>
@endsection
