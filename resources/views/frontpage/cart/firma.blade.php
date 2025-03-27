@extends('layouts.frontend.cursos.appsign')
@section('content')

<main class="firma">
        <div class="firma__header">
            <div class="row justify-content-center">
				<div class="col-md-3">
					<div class="firma__header__picture">
						<img src="/images/Logo-TAP.png" class="img-fluid">
					</div>
				</div>
            </div>
        </div>
        <div class="firma__body">
			<form action="{{route('sign.register')}}" method="POST" >
				@csrf
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="firma__body__titulo">
								Enrollment agreement and eligibility notification
							</div>
						</div>
						<div class="col-md-12">
							<div class="firma__body__contenido ">
								<div class="error__entexto error">

								</div>
								<p>I, <input type="text" name="fullname" id="fullname" placeholder="Full name" class="mb-2 form-control">

									(name) (referred to as "I" or "me"), understand that the training course provided by TAP Security Academy, LLC and its affiliate, Texas Asset Protection, LLC (collectively, the “Company”) in which I am enrolling is non-refundable. I acknowledge that no security agencies, 
									including the Company, are obligated to hire me solely by me taking this course and that this course does not license me as a security officer. I am taking the above course solely to increase my knowledge in the field of security,
									 and this course only grants me a Certification of Completion. <br>

This online, commissioned security course, including all lectures and videos, is designed to provide educational content and training for individuals seeking to become licensed security guards in the state of Texas. This course is overseen by the Texas Department of 
Public Safety (“DPS”), specifically through its Regulatory Services Division (“RSD”) under the Private Security Program (“PSP”).<br>


									 <input type="text" name="initial" id="initial" placeholder="Inital here" class="form-control"></p>
								<h3>Notification of Eligibility:</h3>
								
								<p>Prior to class enrollment or payment, please review Texas Administrative Code Section 35.4’s list of disqualifying offenses and the related periods of ineligibility which is attached hereto as Exhibit 
								A and available on the DPS website at htttp://www.dps.textas.gov/rsd/psb/index.htm. You also have the right to request from DPS a criminal history evaluation letter under Occupations Code Section 53.102,
								 attached hereto as Exhibit B. Pursuant to Texas Occupations Code Chapter 1702 and Texas Administrative Code 35.4, a criminal conviction may disqualify you from a registration, commission, or license under the Act.</p>

								 <h3>Disclaimer of Liability </h3>
								<p>The Company makes no guarantees or warranties, either express or implied, regarding the accuracy, completeness, or applicability of the information presented in this course.
								 The information is provided "as is" and is intended solely for educational purposes. Participants are responsible for ensuring they meet all state requirements for licensure and should consult with 
								 the Texas Department of Public Safety for any specific questions or clarifications regarding licensing regulations.</p>

								<h3>Certification and Licensing </h3>
								<p>Completion of this course does not guarantee that I will receive a commissioned security guard pocket card or any other certification from the Texas Department of Public Safety.
								 All participants must successfully complete all required exams, background checks, and any other requirements mandated by the DPS, RSD, and PSP to be eligible for licensure.
								
								<H3> Changes and Updates</H3>
								<p> DPS, RSD, and PSP may update or change the licensing requirements and regulations at any time. It is the responsibility of the participant to stay informed of any such changes and to
								 comply with the current standards and requirements.</p>
								

								 <h3>Limitation of Liability</h3><p> To the fullest extent permitted by law, the Company shall not be liable for any direct, indirect, incidental, special, or consequential damages resulting from the use or inability
								  to use the materials provided in this course, even if the Company has been advised of the possibility of such damages. 
								  The Participant understands that the Company shall have no liability for any of the information provided during the course and that the information provided during the course does not address situations that I may encounter.
								   I therefore understand that I am solely responsible for any and all actions taken and/or any inaction by me based on such information and any and all damages or injuries that may result.  I assume all risk and liability 
								   for my own actions taken and/or inactions resulting from my participation in this course and the information provided.  </p> 

								  <h3>Contact Information </h3>
								  <p>For any questions or concerns regarding the requirements for becoming a licensed security guard in Texas, please contact the Texas Department of Public Safety, Regulatory Services Division, 
								  Private Security Program.</p>

								 <h3> Collection and Use of Personal Information </h3>
								 <p>I acknowledge and agree that personally identifying information, including but not limited to name, email address, social security number, date of birth, and other contact 
								  information, may be collected and maintained by the Company for the purpose of providing updates about future courses, training opportunities, and relevant job opportunities. The Company shall not and agrees not to share, 
								  sell, or disclose this information to third parties without prior consent, except as required by law. I may opt out of receiving non-essential communications at any time by following the instructions provided in such 
								  communications or by contacting the Company directly via email at sales@txassetpro.com. I understand that the Company is committed to protecting my privacy and handling all collected information in accordance with 
								  applicable data protection laws and internal privacy policies.</p>




								 
<h3>ACKNOWLEDGMENT:</h3>
<p>I <input type="text" name="fullname2" id="fullname2" placeholder="Full name" class="mb-2 form-control"> confirm that I have been made aware of and fully understand all the information listed above and have been informed that by taking this training course
	 I am not guaranteed that the licensing agency will grant my license. I further acknowledge that the below described information has been provided to me.</p> <br><br>

	 <ul>
	 <li>The department’s current eligibility guidelines (the board’s administrative rules) issued under Occupations Code, Section 53.025;</li>
	 <li>The potential ineligibility of an individual who has been convicted of a criminal offense; </li>
	 <li>The right to request a criminal history evaluation under Occupations Code Section 53.102; and</li>
	 <li>Any other state or local restriction or guideline used by the department to determine the eligibility of an individual who has been convicted of an offense.</li>
	</ul>
	


							</div>
						</div>

						<div class="col-md-12">
							<h2>TEXAS ADMINISTRATIVE CODE </h2>
							<h5>Section 35.4. GUIDELINES FOR DISQUALIFYING CRIMINAL OFFENSES</h5>


							<p>(a) The private security profession is in a position of trust; it provides services to members of the public that involve access to confidential information, to private property, and to the more vulnerable and defenseless persons within our society. By virtue of their licenses, security professionals are provided with greater opportunities to engage in fraud, theft, or related property crimes. In addition, licensure provides those predisposed to commit assaultive or sexual crimes with greater opportunities to engage in such conduct and to escape detection or prosecution.</p>
<p>(b) Therefore, the commission determined that offenses detailed in subsection (c) of this section directly relate to the duties and responsibilities of those who are licensed under the Act. Such offenses include crimes under the laws of another state or the United States, if the offense contains elements that are substantially similar to the elements of an offense under the laws of this state. Such offenses also include those "aggravated" or otherwise enhanced versions of the listed offenses.</p>
<p>(c) The list of offenses in this subsection is intended to provide guidance only and is not exhaustive of either the offenses that may relate to a particular regulated occupation or of those that are independently disqualifying under Texas Occupations Code, §53.021(a)(2) - (4). With the exception of those offenses listed in paragraphs (6)(A) - (6)(F) of this subsection, the offenses listed in paragraphs (1) - (5) and (7) - (14) of this subsection are general categories that include all specific offenses within the corresponding chapter of the Texas Penal Code. In addition, after due consideration of the circumstances of the criminal act and its relationship to the position of trust involved in the particular licensed occupation, the commission may find that an offense not described below also renders a person unfit to hold a license. In particular, an offense that is committed in one's capacity as a licensee under the Act, or an offense that is facilitated by one's license under the Act, will be considered related to the licensed occupation and may render the person unfit to hold the license.</p>


<p>(1) Arson, damage to property--Any offense under the Texas Penal Code, Chapter 28.</p>

<p>(2) Assault--Any offense under the Texas Penal Code, Chapter 22.</p>

<p>(3) Bribery--Any offense under the Texas Penal Code, Chapter 36.</p>

<p>(4) Burglary and criminal trespass--Any offense under the Texas Penal Code, Chapter 30.</p>

<p>(5) Criminal homicide--Any offense under the Texas Penal Code, Chapter 19.</p>

<p>(6) Disorderly conduct--Any of the offenses detailed in paragraphs (6)(A) - (6)(F), but only if committed by an applicant for, or holder of, a license as a security officer, personal protection officer, or private investigator:</p>

<p> (A) 42.01(a)(7) and 42.01(a)(8) only - discharge of firearm in public place, and display of firearm or other deadly weapon in public place calculated to alarm.</p>

<p>(B) 42.06, False Alarm or Report.</p>
    <p>(C) 42.062, Interference with Emergency Request for Assistance.</p>
    <p>(D) 42.07, Harassment.</p>
    <p>(E) 42.072, Stalking.</p>
    <p>(F) 42.12, Discharge of Firearm in Certain Municipalities.</p>
  <p>(7) Fraud--Any offense under the Texas Penal Code, Chapter 32.</p>
  <p>(8) Kidnapping--Any offense under the Texas Penal Code, Chapter 20.</p>
  <p>(9) Obstructing governmental operation--Any offense under the Texas Penal Code, Chapter 38.</p>
  <p>(10) Perjury--Any offense under the Texas Penal Code, Chapter 37.</p>
  <p>(11) Robbery--Any offense under the Texas Penal Code, Chapter 29.</p>
  <p>(12) Sexual offenses--Any offense under the Texas Penal Code, Chapter 21.</p>
  <p>(13) Theft--Any offense under the Texas Penal Code, Chapter 31.</p>
  <p>(14) In addition:</p>
   <p> (A) An attempt to commit a crime listed in this subsection;</p>
    <p>(B) Aiding and abetting in the commission of a crime listed in this subsection; and</p>
    <p>(C) Being an accessory (before or after the fact) to a crime listed in this subsection.</p>
<p>(d) A felony conviction for an offense listed in subsection (c) of this section is disqualifying for ten (10) years from the date of conviction.</p>
<p>(e) A Class A misdemeanor conviction for an offense listed in subsection (c) of this section is disqualifying for five (5) years from the date of conviction.</p>
<p>(f) Independently of whether the offense is otherwise described or listed in subsection (c) of this section, a conviction for an offense listed in Texas Code of Criminal Procedure, Article 42.12 §3g, or Article 42A.054, or that is a sexually violent offense as defined by Texas Code of Criminal Procedure, Article 62.001, or a conviction for burglary of a habitation, is permanently disqualifying subject to the requirements of Texas Occupations Code, Chapter 53.</p>
<p>(g) A Class B misdemeanor conviction for an offense listed in subsection (c) of this section is disqualifying for two (2) years from the date of conviction.</p>
<p>(h) Any unlisted offense that is substantially similar in elements to an offense listed in subsection (c) of this section is disqualifying in the same manner as the corresponding listed offense.</p>


<p>(i) A pending charge under an indictment or information for an offense listed in subsection (c) of this section is grounds for summary suspension.</p>
<p>(j) In determining the fitness to perform the duties and discharge the responsibilities of the licensed occupation of a person against whom disqualifying charges have been filed or who has been convicted of a disqualifying offense, the department will consider:</p>
  <p>(1) The extent and nature of the person's past criminal activity;</p>
  <p>(2) The age of the person when the crime was committed;</p>
  <p>(3) The amount of time that has elapsed since the person's last criminal activity;</p>
  <p>(4) The conduct and work activity of the person before and after the criminal activity;</p>
  <p>(5) Evidence of the person's rehabilitation or rehabilitative effort while incarcerated or after release;</p>
  <p>(6) The date the person will be eligible; and</p>
  <p>(7) Any other evidence of the person's fitness, including letters of recommendation.</p>
<p>(k) In addition to the documentation listed in subsection (j) of this section, the applicant or licensee shall furnish proof in the form required by the department that the person has:</p>
  <p>(1) Maintained a record of steady employment;</p>
  <p>(2) Supported the applicant's dependents;</p>
  <p>(3) Maintained a record of good conduct; and</p>
  <p>(4) Paid all outstanding court costs, supervision fees, fines and restitution ordered in any criminal case in which the applicant has been charged or convicted.</p>
<p>(l) The failure to timely provide the information listed in subsection (j) and subsection (k) of this section may result in the proposed action being taken against the application or license.</p>
<p>(m) The provisions of this section are authorized by the Act, §1702.004(b), and are intended to comply with the requirements of Texas Occupations Code, Chapter 53. All periods of disqualification provided in this section are subject to an analysis under subsection (j) of this section, and the requirements of Texas Occupations Code, Chapter 53.</p>
<br><br>
<h2>OCCUPATION CODE</h2>
<h5>Section 53.102. REQUEST FOR CRIMINAL HISTORY EVALUATION LETTER.</h5>

<p>(a)	A person may request a licensing authority to issue a criminal history evaluation letter regarding the person’s eligibility for a license issued by that authority if the person:</p>
<p>(1)	is enrolled or planning to enroll in educational program that prepares a person for an initial license or is planning to take an examination for an initial license; and </p>
<p>(2)	has reason to believe that the person is ineligible for the license due to a conviction or deferred adjudication for a felony or misdemeanor offense. </p>
<p>(b)	The request must state the basis for the person’s potential ineligibility.</p>

<br><br>
<h3>RELEASE AND WAIVER OF LIABILITY AND ASSUMPTION OF RISK:</h3>
<p>I <input type="text" name="nameuser" id="nameuser" placeholder="name" class="mb-2 form-control"> (name) (referred to as "I" or "me"), desire to participate in the training course which may include participation in defensive tactics, handcuffing, intermediate weapons use, firearms handling, cardiopulmonary resuscitation (“CPR”), automated external defibrillator (“AED”) use, and live scenario training (whether singular or plural, hereinafter referred to as the "Activities") provided by TAP Security Academy, LLC, a Texas limited liability company, and its affiliate, Texas Asset Protection, LLC, a Texas limited liability company with offices located at 11503 Jones Maltsberger, Suite 1158, San Antonio, Texas 78216 (collectively, the "Company"). In consideration of being permitted by the Company to participate in the Activities, and in recognition of the Company's reliance hereon, I agree to all the terms and conditions set forth in this instrument (this "Release").</p>

<p><strong>I AM AWARE AND UNDERSTAND THAT THE ACTIVITIES ARE POTENTIALLY DANGEROUS ACTIVITIES AND INVOLVE THE RISK OF PERSONAL OR PSYCHOLOGICAL INJURY, PAIN, SUFFERING, TEMPORARY OR PERMANENT DISABILITY, DEATH, PROPERTY DAMAGE AND/OR FINANCIAL LOSS. I ACKNOWLEDGE THAT ANY INJURIES THAT I SUSTAIN MAY RESULT FROM OR BE COMPOUNDED BY THE ACTIONS, OMISSIONS, OR NEGLIGENCE OF THE COMPANY, INCLUDING NEGLIGENT EMERGENCY RESPONSE OR RESCUE OPERATIONS OF THE COMPANY. NOTWITHSTANDING THE RISK, I ACKNOWLEDGE THAT I AM KNOWINGLY AND VOLUNTARILY PARTICIPATING IN THE ACTIVITIES WITH AN EXPRESS UNDERSTANDING OF THE DANGER INVOLVED AND HEREBY AGREE TO ACCEPT AND ASSUME ANY AND ALL RISKS OF INJURY, DISABILITY, DEATH, AND/OR PROPERTY DAMAGE ARISING FROM THE ACTIVITIES, WHETHER CAUSED BY THE ORDINARY NEGLIGENCE OF THE COMPANY OR OTHERWISE.</strong></p>

<p><strong>I HEREBY EXPRESSLY WAIVE AND RELEASE ANY AND ALL CLAIMS, NOW KNOWN OR HEREAFTER KNOWN, AGAINST THE COMPANY, AND ITS OFFICERS, DIRECTORS, MANAGER(S), EMPLOYEES, AGENTS, AFFILIATES, SHAREHOLDERS/MEMBERS, SUCCESSORS, AND ASSIGNS (COLLECTIVELY, "RELEASEES"), ON ACCOUNT OF INJURY, DISABILITY, DEATH, OR PROPERTY DAMAGE ARISING OUT OF OR ATTRIBUTABLE TO THE ACTIVITIES, WHETHER ARISING OUT OF THE ORDINARY NEGLIGENCE OF THE COMPANY OR ANY RELEASEES OR OTHERWISE. I COVENANT NOT TO MAKE OR BRING ANY SUCH CLAIM AGAINST THE COMPANY OR ANY OTHER RELEASEE, AND FOREVER RELEASE AND DISCHARGE THE COMPANY AND ALL OTHER RELEASEES FROM LIABILITY UNDER SUCH CLAIMS. THIS WAIVER AND RELEASE DOES NOT 
	EXTEND TO CLAIMS FOR GROSS NEGLIGENCE, WILLFUL MISCONDUCT, OR ANY OTHER LIABILITIES THAT TEXAS LAW DOES NOT PERMIT TO BE RELEASED BY AGREEMENT.
I SHALL DEFEND, INDEMNIFY, AND HOLD HARMLESS THE COMPANY AND ALL OTHER RELEASEES AGAINST ANY AND ALL LOSSES, DAMAGES, LIABILITIES, DEFICIENCIES, CLAIMS, ACTIONS, JUDGMENTS, SETTLEMENTS, INTEREST, AWARDS, PENALTIES, FINES, COSTS, OR EXPENSES OF WHATEVER KIND, INCLUDING REASONABLE ATTORNEY FEES, FEES, THE COSTS OF ENFORCING ANY RIGHT TO INDEMNIFICATION UNDER THIS RELEASE, AND THE COST OF PURSUING ANY INSURANCE PROVIDERS ARISING OUT OF OR RESULTING FROM ANY CLAIM OF A THIRD PARTY RELATED TO MY PARTICIPATION IN THE ACTIVITIES, INCLUDING ANY CLAIM RELATED TO MY OWN NEGLIGENCE OR THE ORDINARY NEGLIGENCE OF THE COMPANY.

</strong></p>

<p>I hereby consent to receive medical treatment deemed necessary if I am injured or require medical attention during my participation in the Activities. I understand and agree that I am solely responsible for all costs related to such medical treatment and any related medical transportation and/or evacuation. I hereby release, forever discharge, and hold harmless the Company and all other Releasees from any claim based on such treatment or other medical services.</p>
<p>This Release constitutes the sole and entire agreement of the Company and me with respect to the subject matter contained herein and supersedes all prior and contemporaneous understandings, agreements, representations, and warranties, both written and oral, with respect to such subject matter. If any term or provision of this Release or the application thereof to any party or circumstance is held invalid, illegal, or unenforceable to any extent in any jurisdiction, then the remaining terms and provisions of this Release and their application to other parties or circumstances shall not be affected thereby and shall be enforced to the greatest extent permitted by law. This Release is binding on and shall inure to the benefit of the Company and me and our respective heirs, successors, and assigns. All matters arising out of or relating to this Release shall be governed by and construed in accordance with the internal laws of the State of Texas, excluding any conflict-of-laws rule or principle that might refer the governance or the construction of this agreement to the laws of another jurisdiction. Any claim or cause of action arising under this Release may be brought only in the federal and state courts located in Bexar County, Texas, and I hereby consent to the exclusive jurisdiction of such courts.</p>
<p><strong>BY SIGNING BELOW, I ACKNOWLEDGE THAT I HAVE READ AND FULLY UNDERSTOOD ALL OF THE TERMS OF THIS RELEASE AND THAT I AM VOLUNTARILY GIVING UP SUBSTANTIAL LEGAL RIGHTS, INCLUDING THE RIGHT TO SUE THE COMPANY, WITHOUT ANY INDUCEMENT, ASSURANCE, OR GUARANTEE BEING MADE TO ME. I COMPLETELY AND UNCONDITIONALLY RELEASE ALL LIABILITY TO THE GREATEST EXTENT ALLOWED BY LAW. I ACKNOWLEDGE THAT PRIOR TO SIGNING THIS AGREEMENT, I HAD THE OPPORTUNITY TO CONSULT WITH AN ATTORNEY TO REVIEW THIS AGREEMENT. I AM AT LEAST EIGHTEEN (18) YEARS OF AGE AND FULLY COMPETENT.</strong></p>
						</div>
					</div>
				</div>
              	<div class="container">
					<div class="row">
						<div class="col-md-4 text-left">
							<div class="firma__body__form">
								<div class="form">
									<div class="form-group">
										<input type="text"  name="legalname" id="legalname" placeholder="Your legal name" class="form-control">
										<span class="error legal-name"></span>
									</div>
									<div class="form-group">
										<input type="text" name="email" id="legaemail" placeholder="Your email address" class="form-control">
										<span class="error legal-email"></span>
									</div>
								</div>
								<div class="firma__body__form__sign">
									<div id="signature-pad" class="signature-pad">
										<div class="signature-pad--body">
										<canvas></canvas>
										</div>
										<div class="signature-pad--footer">
											<div class="boton__sign"><img src="/images/firma.png" class="img-fluid"><br>Sign here</div>
											<a href="#" class="btn btn-xs btn-default" id="clear">Clear</a>
										</div>
									</div>
									<span class="sign-error error"></span>
								</div>
							</div>
						</div>
					</div>
                    @desktop
                    <div class="row justify-content-end ">
						<div class="col-md-3 text-right">
							<a href="#" class="color__rojo btn__form__sign">Agree & Sign</a>
						</div>
                    </div>
                    @enddesktop
                    @mobile
                     <div class="row justify-content-start ">
						<div class="col-6 text-left">
							<a href="#" class="color__rojo btn__form__sign">Agree & Sign</a>
						</div>
					</div>
                    @endmobile

              	</div>
			</form>
        </div>
</main>


<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">

		<div class="modal-body">
		  <div class=" col-md-12" >
			<div class="row">

			  <div class="texto__error col s10">

			  </div>
			</div>
		  </div>



		</div>
		<div class="modal-footer">
		<button type="button" class="btn fondo__rojo btn__loginsumit" data-dismiss="modal">Close</button>
		</div>

	  </div>
	</div>
  </div>

@endsection
