@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2 justify-content-center">
            <div class="col-sm-6 text-center">
              <h1>User Enrollment</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
            <main class="firma">
                    <div class="firma__header">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="firma__header__picture pt-5">
                                    <img src="/images/Logo-TAP.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="firma__body">

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="firma__body__titulo pt-5 pb-5">
                                            <h2>Enrollment agreement and eligibility notification</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="firma__body__contenido ">
                                            <div class="error__entexto error">

                                            </div>
                                            <p>I, <strong>{{$user->fullname}}</strong>

                                                understand that the online course “Level II Non-Commissioned Officer Training Course” I am enrolling in is <strong>non-refundable</strong> and the cost of the course is $45.00.
                                                I am aware that no security agencies are guaranteed or obligated to hire me solely by me taking this course and that this course does not license me as a security officer.
                                                I understand that I am taking the above course in order to increase my knowledge in the field of security and only grants me a Certification of Completion. <strong>{{$user->initial}}</strong></p>

                                                <h3 class="pb-3">Notification of Eligibility:</h3>
                                            <p>Please review Rule 35.4’s list of disqualifying offenses and the related periods of ineligibility which is attached and available on the department’s website at htttp://www.dps.textas.gov/rsd/psb/index.htm (click on the link to Administrative Code) prior to class enrollment or payment. You also have a right to request from the department a criminal history evaluation letter under Occupations Code Section 53.102.” The Private Security Act (Occ. Code Chapter 1702) and Administrative Rule 35.4 (37 Tex. Admin. Code 1), a criminal conviction may disqualify you from a registration, commission, or license under the Act.</p>
                                            <p>Rule 35.4 Guidelines for Disqualifying Criminal Offenses</p>

                <ul style="list-style: none; padding-left:1rem;">
                    <li>(a)	The private security industry is in a position of trust; it provides services to members of the public that involve access to confidential information to private property, and to the more vulnerable and defenseless persons within our society. By virtue of their licenses, security professionals are provided with greater opportunities to engage in fraud, theft, or related property crimes. In addition, licensure provides those predisposed to commit assaultive or sexual crimes with greater opportunities to engage in such conduct and to escape detection or prosecution. </li>
                    <li>(b)	Therefore, the board has determined that offenses of the following types directly relate to the duties and responsibilities of those who are licensed under the Act. Such offenses include crimes under the laws of another state or the United States, if the offense contains elements that are substantially similar to the elements of an offense under the laws of this state. Such offenses also include those “aggravated” or otherwise enhanced versions of the listed offenses. </li>
                    <li>(c)	The list of offenses in this subsection is intended to provide guidance only and it is not exhaustive of either the offenses that may relate to a particular regulated occupation or of those that are independently disqualifying under Texas Occupations Code 53.021 (a)(2)- (4). The listed offenses are general categories that include all specific offenses within the corresponding chapter of the Texas Penal Code. In addition, after due consideration of the circumstances of the criminal act and its relationship to the position of trust involved in the particular licenses occupation, the board may find that an offense not described below also renders a person unfit to hold a license. In particular, an offense that is committed in one’s capacity as a registrant under the Act, or an offense that if facilitated by one’s registration, endorsement, or commission under the Act, will be considered related to the licensed occupation and may render the person unfit to hold the license.</li>
                    <li>(1)	Arson, damage to property - -Any offense under the Texas Penal Code, Chapter 28. </li>
                    <li>(2)	Assault- - Any offense under the Texas Penal Code, Chapter 22.</li>
                    <li>(3)	Bribery - - Any offense under the Texas Penal Code, Chapter 36.</li>
                    <li>(4)	Burglary and criminal trespass - - Any offense under the Texas Penal Code, Chapter 30. </li>
                    <li>(5)	Criminal Homicide - - any offense under the Texas Penal Code, Chapter 19.</li>
                    <li>(6)	Disorderly Conduct - - Any offense under the Texas Penal Code, Chapter 42.</li>
                    <li>(7)	Fraud- - Any offense under Texas Penal Code, Chapter 32.</li>
                    <li>(8)	 Kidnapping - - Any offense under the Texas Penal Code, Chapter 20.</li>
                    <li>(9)	Obstructing governmental operation - - Any offense under the Texas Penal Code, Chapter 38.</li>
                    <li>(10)	Perjury- - Any offense under the Texas Penal Code, Chapter 37. </li>
                    <li>(11)	Robbery - - Any offense under the Texas Penal Code, Chapter 29.</li>
                    <li>(12)	Sexual offenses - - Any offense under the Texas Penal Code, Chapter 21.</li>
                    <li>(13)	Theft - - Any offense under the Texas Penal Code, Chapter 31. </li>
                    <li>(14)	In addition;</li>
                    <li>(A)	An attempt to commit a crime listed in this subsection;</li>
                    <li>(B)	Aiding and abetting in the commission of a crime listed in this subsection; and </li>
                    <li>(C)	Being an accessory (before or after the fact) to a crime listed in this subsection. </li>
                    <li>(D)	A felony conviction for an offense listed in subsection (c) of this section is disqualifying for ten (10) years from the date of the completion of the sentence, unless subject to this subsection. </li>
                    <li>(E)	A Class A misdemeanor conviction for an offense listed in subsection (c) of this section is disqualifying for five (5) years from the date of completion of the sentence. </li>
                    <li>(F)	Conviction for a felony or Class A offense that does not relate to the occupation for which license is sought is disqualifying for five (5) years from the date of commission, pursuant to Texas Occupations Code 53.021 (a)(2).</li>
                    <li>(G)	Independently of whether the offense is otherwise described or listed in subsection (c) of this section, a conviction for an offense listed in Texas Code of Criminal Procedure, Article 42.12 3g, or Article 42A.054, or that is a sexually violent offense as defined by Texas Code of Criminal Procedure. Article 62.001, or a conviction for burglary of a habitation, is permanently disqualifying subject to the requirements of Texas Occupations Code, Chapter 53. </li>
                    <li>(H)	A Class B misdemeanor conviction for an offense listed in subsection (c) of this section is disqualifying for five (5) years from the date of conviction. </li>
                    <li>(I)	Any unlisted offense that is substantially similar in elements to an offense listed in subsection (c)of this section disqualifying in the same manner as the corresponding listed offense. </li>
                    <li>(J)	A pending Class B misdemeanor charge by information for an offense listed in subsection (c) of this section is ground for summary suspension. </li>
                    <li>(K)	Any pending Class A misdemeanor charged by information or pending felony charged by indictment is grounds for summary suspension. </li>
                    <li>(L)	In determining the fitness to perform the duties and discharge the responsibilities of the licensed occupation of a person against whom disqualifying charges have been filed or who had been convicted of disqualifying offense, the board shall consider:</li>
                    <li>(1)	The extent and nature of the person’s past criminal activity; </li>
                    <li>(2)	The age of the person when the crime was committed;</li>
                    <li>(3)	The amount of time that has elapsed since the person’s last criminal activity;</li>
                    <li>(4)	The conduct and work activity of the person before and after the criminal activity; </li>
                    <li>(5)	Evidence of the person’s rehabilitation or rehabilitative effort while incarcerated or after release; </li>
                    <li>(6)	The date the person will be eligible; and </li>
                    <li>(7)	Any other evidence of the person’s fitness, including letters of recommendation from:</li>
                    <li>(A)	Prosecutors or law enforcement and correctional officers who prosecuted, arrested, or had custodial responsibility for the person; or </li>
                    <li>(B)	The sheriff or chief of police in the community where the person resides.</li>
                    <li>(M)	 In addition to the documentation listed in subsection (I) of this section, the applicant or licensee or registrant shall furnish proof in the form required by the department that the person has:</li>
                    <li>(1)	Maintained a record of steady employment;</li>
                    <li>(2)	Supported the applicant’s dependents;</li>
                    <li>(3)	Maintained a record of good conduct and </li>
                    <li>(4)	Paid all outstanding court costs, supervision fees, fines and restitution ordered in any criminal case in which the applicant has been charged or convicted.</li>
                    <li>(N)	The failure to timely provide the information listed in subsection (I) and subsection (m) of this section may result in the proposed action being taken against the application or license. </li>
                    <li>(O)	The provisions of this section are authorized by the Act, 1702.004(b), and are intended to comply with the requirements of Texas Occupations Code. Chapter 53. </li>

                </ul>

                <h3>OCCUPATION CODE</h3>
                <p>Sec. 53.102. REQUEST FOR CIMINAL HISTORY EVALUATION LETTER.<br>
                    (a)	A person may request a licensing authority to issue a criminal history evaluation letter regarding the person’s eligibility for a license issued by that authority if the person:<br>
                    (1)	is enrolled or planning to enroll in educational program that prepares a person for an initial license or is planning to take an examination for an initial license; and<br>
                    (2)	has reason to believe that the person is ineligible for the license due to a conviction or deferred adjudication for a felony or misdemeanor offense. <br>
                    (b)	The request must state the basis for the person’s potential ineligibility.
                    </p>
                <h3>ACKNOWLEDGMENT:</h3>
                <p>I <strong>{{$user->fullname}}</strong> confirm that I have been made aware of and fully understand
                    all the information listed above and have been informed that by taking this training course I am not guaranteed that the licensing agency will grant my license. <br><br>

                    The information below was provided to me;<br>
                    •	The department’s current eligibility guidelines (the board’s administrative rules) issued under Occupations Code, Section 53.025;<br>
                    •	The potential ineligibility of an individual who has been convicted of a criminal offense; <br>
                    •	The right to request a criminal history evaluation under Occupations Code Section 53.102. <br>
                    •	Any other state or local restriction or guideline used by the department to determine the eligibility of an individual who has been convicted of an offense<br>
                </p>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 text-left">
                                        <div class="firma__body__form">
                                            <div class="form">
                                                <div class="form-group">
                                                    <strong>{{$user->legalname}}</strong><br>
                                                        <strong>{{$user->email}}</strong>
                                                </div>
                                            </div>
                                            <div class="firma__body__form__sign mb-5">
                                                <div>
                                                    <div class="signature-pad--body">
                                                    <img src="{{$user->firma}}"  class="img-fluid">
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                    </div>
                </main>

            </div>
        </div>
        </div>
        </div>
      </section>

</div>

@endsection
