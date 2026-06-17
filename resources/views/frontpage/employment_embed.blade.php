<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAP Security Employment Form</title>

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/backend/plugins/fontawesome-free/css/all.min.css">
    <link href="/vendor/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600&subset=latin,greek,latin-ext,vietnamese' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css?v={{ uniqid() }}">
</head>
<body class="employment-embed-body">
    <section id="frm-contenido" class="employment-embed-section">
        <div class="container application">
            <div class="card employment-embed-card">
                <div class="card-body appliend sombra">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="linebox">
                                <h1>APPLICANT INFORMATION</h1>
                            </div>
                        </div>
                    </div>

                    <form class="form" action="{{ route('front.thanks') }}" method="POST" id="form-employment" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="embedded" value="1">

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

                        <div class="lienzo">
                            @include('layouts.frontend.partials.form.education')
                        </div>

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
                                        <p>Please list three professional references.</p>
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
                                <p>
                                    I certify that my answers are true and complete to the best of my knowledge. If this application
                                    leads to employment, I understand that false or misleading information in my application or interview
                                    may result in my release.
                                </p>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <legend class="col-form-label etiqueta">Attach Id</legend>
                                    <input id="fileid" name="fileid[]" type="file" multiple>
                                </div>
                                <div class="col-md-4">
                                    <legend class="col-form-label etiqueta">Signature *</legend>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-12">
                                            <input type="text" name="signature" id="signature" class="form-control" placeholder="Signature" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <legend class="col-form-label etiqueta">Date *</legend>
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
                                <button
                                    type="submit"
                                    id="form-employment"
                                    data-sitekey="6Lcp-V0qAAAAAK-IZoSfefYdRjT4Gbdn47XJkD7d"
                                    data-callback='onSubmit'
                                    data-action='submit'
                                    class="g-recaptcha btn btn-danger btn-medium btn-employment-submit"
                                >
                                    SUBMIT
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.frontend.partials.scriptDefault')

    <style>
        .employment-embed-body {
            background: #ffffff;
            overflow: hidden;
        }

        .employment-embed-section {
            padding: 0 0 2rem;
        }

        .employment-embed-card {
            border: 0;
            box-shadow: none;
        }

        .employment-embed-body .container.application {
            max-width: 100%;
            padding: 0 1.25rem;
        }
    </style>

    <script>
        function notifyHeight() {
            var h = document.documentElement.scrollHeight || document.body.scrollHeight;
            window.parent.postMessage({ type: 'tap_iframe_resize', height: h }, '*');
        }

        window.addEventListener('load', function () { setTimeout(notifyHeight, 100); });
        window.addEventListener('resize', notifyHeight);

        // Re-notify when files are attached or inputs change (layout may shift)
        document.addEventListener('change', function () { setTimeout(notifyHeight, 150); });
    </script>
</body>
</html>
