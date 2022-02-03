<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>



section#frm-contenido {
    padding: 0;
    font-size: 12px;
}
h4 {
    font-size: 20px;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 12px;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
input[type=checkbox]:checked:after {
    content: " ";
    background-color: transparent;
    position: absolute;
    height: 14px;
    top: 5px;
    width: 14px;
    border-radius: 2px;
}
.form__input {
    border: 1px solid;
    padding: 4px;
}
span.active {
    display: inline-block;
    width: 12px;
    height: 12px;
    background: #E01F26;
    border:1px solid #E01F26;
    text-indent: -9999px;
}
span {
    display: inline-block;
    width: 12px;
    height: 12px;
    background: white;
    border: solid rgb(0, 0, 0) 1px;
    text-indent: -9999px;
}

table tr td{
    font-size: 12px;
}

    </style>
</head>
<body>


<table width="100%">
    <tr>
        <td style="text-align: center;">
            <div class="linebox">
                <h1>FORM 8850</h1>
            </div>

            <h4> Pre-Screening Notice and Certification Request for  the Work Opportunity Credit</h4>
            <p>  Information about Form 8850 and its separate instructions is at www.irs.gov/form8850</p>

            <hr>
            <p>Job applicant: Fill in the lines below and check any boxes that apply. Complete only this side.</p>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width:100%">
                <tr>
                    <td>
                        <legend class="col-form-label">YOUR NAME</legend>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <div class="form__input">
                                    {{ @$data->yourname }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>

                        <legend class="col-form-label">SOCIAL SECURITY NUMBER</legend>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-12">

                                <div class="form__input">
                                    {{ @$data->socialnumber }}
                                </div>

                            </div>
                        </div>
                    </td>
                </tr>
            </table>




        </td>
    </tr>
    <tr>
        <td>


                <legend class="col-form-label">STREET ADDRESS WHERE YOU LIVE</legend>
                <div class="form-row">

                        <div class="form-group col-md-12 col-12">

                            <div class="form__input">
                                {{ @$data->address}}
                            </div>
                        </div>
                </div>


        </td>
    </tr>
    <tr>
        <td>

            <table style="width:100%">

                <tr>
                    <td>
                        <legend class="col-form-label">COUNTRY</legend>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-12">
                                <div class="form__input">
                                    {{ @$data->country }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>

                        <legend class="col-form-label">TELEPHONE NUMBER</legend>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-12">



                                <div class="form__input">
                                    {{ @$data->telephone }}
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            </table>


        </td>
    </tr>
    <tr>
        <td>
            <table style="width:100%">

                <tr>
                    <td style="width:50%">
                        <legend class="col-form-label uppercase"> If you are under age 40, enter your date of birth (month, day, year)</legend>
                        <div class="form-row">

                                <div class="form-group col-md-4 col-12">

                                    <div class="form__input">
                                        {{ @$data->birthday }}
                                    </div>

                                </div>
                        </div>
                    </td>
                    <td>

                    </td>
                </tr>
            </table>
        </td>
    <tr>
        <td>



            <div class="form-check">
                 @if(isset($condicion[0]))
                 <span class="active"></span>
                 @else
                 <span ></span>
              @endif
                <label class="form-check-label" for="opcion1">
                    Check here if you received a conditional certification from the state workforce agency (SWA) or a participating local agency
                    for the work opportunity credit.
                </label>
            </div>
        </td>
    </tr><tr>
        <td>
            <div class="form-check">

                @if(isset($condicion[1]))
                <span class="active"></span>
                @else
                    <span ></span>
                 @endif

                    Check here if any of the following statements apply to you.

                    <ul>
                     <li>
                         I am a member of a family that has received assistance from Temporary Assistance for Needy Families (TANF) for any 9
                        months during the past 18 months.
                        </li><li>
                        I am a veteran and a member of a family that received Supplemental Nutrition Assistance Program (SNAP) benefits (food
                        stamps) for at least a 3-month period during the past 15 months.
                        </li><li>
                        I was referred here by a rehabilitation agency approved by the state, an employment network under the Ticket to Work
                        program, or the Department of Veterans Affairs.
                        </li><li>
                        I am at least age 18 but not age 40 or older and I am a member of a family that:<br>
                        a. Received SNAP benefits (food stamps) for the past 6 months; or<br>
                        b. Received SNAP benefits (food stamps) for at least 3 of the past 5 months, but is no longer eligible to receive them.
                        </li><li>
                        During the past year, I was convicted of a felony or released from prison for a felony.
                        </li><li>
                        I received supplemental security income (SSI) benefits for any month ending during the past 60 days.
                        </li><li>
                        I am a veteran and I was unemployed for a period or periods totaling at least 4 weeks but less than 6 months during the
                        past year.
                        </li>

                    </ul>
                </label>
            </div>
        </td>
    </tr><tr>
        <td>
            <div class="form-check">
                 @if(isset($condicion[2]))
                 <span class="active"></span>
                 @else
                     <span></span>
                @endif

                <label class="form-check-label" for="opcion3">
                    Check here if you are a veteran and you were unemployed for a period or periods totaling at least 6 months during the past
                    year.
                </label>
            </div>
        </td>
    </tr><tr>
        <td>
            <div class="form-check">
                 @if(isset($condicion[3]))
                 <span class="active"></span>
                @else
                    <span></span>
                 @endif
                <label class="form-check-label" for="opcion4">
                    Check here if you are a veteran entitled to compensation for a service-connected disability and you were discharged or
                    released from active duty in the U.S. Armed Forces during the past year.
                </label>
            </div>
        </td>
    </tr><tr>
        <td>
            <div class="form-check">
                @if(isset($condicion[4]))
                 <span class="active"></span>
                 @else
                    <span ></span>
                 @endif
                <label class="form-check-label" for="opcion5">
                    Check here if you are a veteran entitled to compensation for a service-connected disability and you were unemployed for a
                    period or periods totaling at least 6 months during the past year.
                </label>
            </div>

        </td>
    </tr>

    <tr>
        <td>

            <div class="form-check">
                 @if(isset($condicion[6]))
                 <span class="active"></span>
                 @else
                    <span ></span>
                 @endif
                <label class="form-check-label" for="opcion7">
                    Check here if you are a member of a family that:
                    <ul>
                        <li>
                    •Received TANF payments for at least the past 18 months; or
                </li><li>
                     Received TANF payments for any 18 months beginning after August 5, 1997, and the earliest 18-month period beginning
                    after August 5, 1997, ended during the past 2 years; or
                </li><li>
                     Stopped being eligible for TANF payments during the past 2 years because federal or state law limited the maximum time
                    those payments could be made.
                </li>
                    </ul>
                </label>
            </div>

        </td>
    </tr><tr>
        <td>

            <div class="form-check">
               @if(isset($condicion[7]))
               <span class="active"></span>
               @else
                  <span ></span>
               @endif
                <label class="form-check-label" for="opcion8">
                    Check here if you are in a period of unemployment that is at least 27 consecutive weeks and for all or part of that period
                    you received unemployment compensation.
                </label>
            </div>



        </td>
    </tr>
    <tr>
            <td>

                <div class="col-md-12 text-center">
                    <h4>Signature—All Applicants Must Sign</h4>

                    <p class="subtext">
                        Under penalties of perjury, I declare that I gave the above information to the employer on or before the day I was offered a job, and it is, to the best of my knowledge, true,
                        correct, and complete.
                    </p>
                </div>

            </td>

    </tr>
</table>



</body>
</html>


