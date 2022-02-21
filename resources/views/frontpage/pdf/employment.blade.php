<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.txassetpro.com/css/main.css?v=3222">
</head>
<body>



    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 ">

                    <div class="card card-primary">


                            <div class="card-body">

                                <div class="col-md-12 text-center">
                                    <div class="linebox">
                                        <h1>APPLICANT INFORMATION</h1>
                                    </div>
                                </div>




                                                <strong><i class="fas fa-user mr-1"></i>FULLNAME </strong>
                                            <p class="text-muted">
                                                {{ $apli->firstname}} {{ $apli->lastname}} {{ $apli->middlename}}
                                            </p>

                                            <strong>M.I:</strong>
                                            <p class="text-muted">
                                                {{ $apli->mi}}
                                            </p>
                                            <strong>DATE: </strong>

                                            <p class="text-muted">
                                               {{ $apli->date}}
                                            </p>
                                        <hr>

                                        <strong><i class="fas fa-map-marked-alt mr-1"></i>ADDRESS</strong>


                                            <p class="text-muted"> {{ $apli->address}}</p>
                                            <strong>Appartment:</strong>
                                            <p class="text-muted"> {{ $apli->apartment}}</p>
                                            <strong>City:</strong>
                                            <p class="text-muted">{{ $apli->city}}</p>
                                            <strong>State:</strong>
                                            <p class="text-muted">{{ $apli->state}}</p>
                                            <strong>Zipcode:</strong>
                                            <p class="text-muted"> {{ $apli->zipcode}}</p>

                                        <hr>

                                        <strong><i class="fas fa-phone mr-1"></i> PHONE</strong>
                                            <p class="text-muted"> {{ $apli->phone}}</p>

                                        <hr>

                                        <strong><i class="far fa-envelope mr-1"></i> EMAIL</strong>
                                            <p class="text-muted"> {{ $apli->email}}</p>

                                        <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>DATE OF BIRTH</strong>
                                        <p class="text-muted"> {{ @$apli->birthday}}</p>
                                        <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>SOCIAL SECURITY NO.</strong>
                                        <p class="text-muted"> {{ @$apli->socialnumber}}</p>
                                        <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>PLACE OF BIRTH</strong>
                                        <p class="text-muted"> {{ @$apli->placebirth}}</p>
                                        <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>POSITION APPLIED FOR AND DESIRED PAY</strong>
                                        <p class="text-muted"> {{ @$apli->appliedpay}}</p>
                                        <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>WHICH SHIFT ARE YOU APPLYING FOR?</strong>
                                        <p class="text-muted"> {{ @$apli->whichshift}}</p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>WHICH DAYS ARE YOU AVAILABLE?</strong>
                                        <p class="text-muted">
                                            @foreach(@$week as $w)
                                                {{ @$w }}
                                            @endforeach
                                        </p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>ARE YOU A CITIZEN OF THE UNITED STATES?</strong>
                                        <p class="text-muted"> {{ @$apli->citizen}}</p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>IF NO, ARE YOU AUTHORIZED TO WORK IN THE U.S.?</strong>
                                        <p class="text-muted"> {{ @$apli->authorized}}</p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>HAVE YOU EVER WORKED FOR THIS COMPANY?</strong>
                                        <p class="text-muted"> {{ @$apli->worked}}</p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>IF YES, WHEN?</strong>
                                        <p class="text-muted"> {{ @$apli->when}}</p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>HAVE YOU EVER BEEN CONVICTED OF A FELONY?</strong>
                                        <p class="text-muted"> {{ @$apli->convicted}}</p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>IF YES, EXPLAIN</strong>
                                        <p class="text-muted"> {{ @$apli->explain1}}</p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>ARE YOU CURRENTLY UNDER INDICTMENT FOR A CRIME?</strong>
                                        <p class="text-muted"> {{ @$apli->indicment}}</p>
                                    <hr>
                                        <strong><i class="far fa-file-alt mr-1"></i>IF YES, EXPLAIN</strong>
                                        <p class="text-muted"> {{ @$apli->explain2}}</p>


                            </div>
                        <!-- /.card-body -->
                    </div>


                    <div class="card card-primary">


                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12 text-center">
                                <div class="linebox">
                                    <h1>EDUCATION</h1>
                                </div>
                            </div>

                            <strong><i class="fas fa-book mr-1"></i>DID YOU GRADUATE HIGH SCHOOL?</strong>
                                <p class="text-muted">
                                    {{ $edu->graduatehigh}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>FROM</strong>
                                <p class="text-muted">
                                {{ $edu->highfrom}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>TO</strong>
                                <p class="text-muted">
                                {{ $edu->hightto}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>HIGH SCHOOL NAME</strong>
                                <p class="text-muted">
                                    {{ $edu->hightschool}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>DID YOU GRADUATE COLLEGE?</strong>
                                <p class="text-muted">
                                    {{ $edu->graduatecollage}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>FROM</strong>
                                <p class="text-muted">
                                    {{ $edu->collagefrom}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>TO</strong>
                                <p class="text-muted">
                                    {{ $edu->collageto}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>COLLAGE NAME</strong>
                                <p class="text-muted">
                                    {{ $edu->collaganame}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>DO YOU HAVE AN ACTIVE SECURITY REGISTRATION CARD?</strong>
                                <p class="text-muted">
                                    {{ $edu->activecard}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>IF YES, WHAT LEVEL SECURITY OFFICER ARE YOU?</strong>
                                <p class="text-muted">
                                    {{ $edu->officer}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>IF LEVEL 3, DO YOU CURRENTLY HAVE A FIREARM?</strong>
                                <p class="text-muted">
                                    {{ $edu->firearm}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>IF YES, WHAT LEVEL HOLSTER ARE YOU CURRENTLY USING?</strong>
                                <p class="text-muted">
                                    {{ $edu->holster}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i>ANY OTHER CERTIFICATIONS</strong>
                                <p class="text-muted">
                                    {{ $edu->others}}
                            </p>

                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="col-md-12 text-center">
                                <div class="linebox">
                                    <h1>REFERENCES</h1>
                                </div>
                            </div>


                            @foreach($references as $k => $ref)
                                <strong><i class="fas fa-book mr-1"></i> FULL NAME</strong>
                                    <p class="text-muted">
                                        {{ $ref->fullname}}
                                    </p>
                                <hr>
                                <strong><i class="fas fa-book mr-1"></i> RELATIONSHIP</strong>
                                    <p class="text-muted">
                                        {{ $ref->relationship}}
                                    </p>
                                <hr>
                                <strong><i class="fas fa-book mr-1"></i> COMPANY</strong>
                                    <p class="text-muted">
                                        {{ $ref->companyref}}
                                    </p>
                                <hr>
                                <strong><i class="fas fa-book mr-1"></i> PHONE</strong>
                                    <p class="text-muted">
                                        {{ $ref->phoneref}}
                                    </p>
                                <hr>
                                <strong><i class="fas fa-book mr-1"></i> ADDRESS</strong>
                                    <p class="text-muted">
                                        {{ $ref->addressreference}}
                                    </p>

                            @endforeach

                        </div>
                        <!-- /.card-body -->
                    </div>



                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="col-md-12 text-center">
                                <div class="linebox">
                                    <h1>PREVIOUS EMPLOYMENT</h1>
                                </div>
                            </div>


                        @foreach($employments as $emp)
                            <strong><i class="fas fa-book mr-1"></i> COMPANY</strong>

                            <p class="text-muted">
                                {{ $emp->company}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-book mr-1"></i> PHONE</strong>
                            <p class="text-muted">
                                    {{ $emp->phoneemp}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> ADDRESS</strong>
                            <p class="text-muted">
                                    {{ $emp->addressempl}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> SUPERVISOR</strong>
                            <p class="text-muted">
                                    {{ $emp->superviso}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> JOB TITLE</strong>
                            <p class="text-muted">
                                    {{ $emp->jobtitle}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> STARTING SALARY</strong>
                            <p class="text-muted">
                                    {{ $emp->starting}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> ENDING SALARY</strong>
                            <p class="text-muted">
                                    {{ $emp->ending}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> FROM</strong>
                            <p class="text-muted">
                                    {{ $emp->from}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> TO</strong>
                            <p class="text-muted">
                                    {{ $emp->to}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> REASON FOR LEAVING</strong>
                            <p class="text-muted">
                                    {{ $emp->reason}}
                            </p>

                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> MAY WE CONTACT YOUR PREVIOUS SUPERVISOR FOR A REFERENCE?</strong>
                            <p class="text-muted">
                                    {{ $emp->references}}
                            </p>

                        @endforeach

                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="col-md-12 text-center">
                                <div class="linebox">
                                    <h1>MILITARY SERVICE</h1>
                                </div>
                            </div>


                        <strong><i class="fas fa-book mr-1"></i> BRANCH</strong>
                        <p class="text-muted">
                            {{ $military->branch}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> TO</strong>
                        <p class="text-muted">
                            {{ $military->branch}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i>FROM</strong>
                        <p class="text-muted">
                            {{ $military->from}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i>RANK AT DISCHARGE</strong>
                        <p class="text-muted">
                            {{ $military->rank}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i>TYPE OF DISCHARGE</strong>
                        <p class="text-muted">
                            {{ $military->type}}
                        </p>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i>IF OTHER THAN HONORABLE, EXPLAIN</strong>
                        <p class="text-muted">
                            {{ $military->explain}}
                        </p>



                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12 text-center">
                                <div class="linebox">
                                    <h1>DISCLAIMER AND SIGNATURE</h1>
                                </div>
                            </div>



                            <strong><i class="fas fa-book mr-1"></i> SIGNATURE</strong>
                            <p class="text-muted">
                                {{ $disclaimer->signature}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-book mr-1"></i> DATE</strong>
                            <p class="text-muted">
                                {{ $disclaimer->datedisclamer}}
                            </p>





                        </div>
                        <!-- /.card-body -->
                    </div>

            </div>

          </div>
        </div>
    </section>



</body>
</html>
