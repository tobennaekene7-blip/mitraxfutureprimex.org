@extends('layouts.base')

@inject('content', 'App\Http\Controllers\FrontController')

@section('title', 'Terms')

@section('styles')
@parent

@endsection

@section('content')
<article class="main-layout__content">
            <!-- Begin page-->
            <!---->
            <section>
              <div class="container">
                <h1 class="title title--left">Privacy & Data Protection Policy                </h1>
                <div class="typography">
<p>
By leaving data on the platform, the user agrees to the Privacy and Information Protection Policy. This Privacy Policy applies only to this site. In case of disagreement with the terms, the User must stop using the site. <br><br>
</p>



<p>
<ul><li><big> <strong>Data Protection</strong></big></li></ul>

The administration of the site {{$settings->site_name}} (hereinafter referred to as the Site) cannot transfer or disclose information provided by the user (hereinafter referred to as the User) when registering and using the site's functionality to third parties. Personal information can be disclosed in cases described by law, or when the administration considers such actions necessary to comply with a legal procedure, a court order or a legal process necessary for the User to work with the Site. In other cases, under no circumstances, the information that the User transmits to the Site will not be disclosed to third parties.<br>
Personal data permitted for processing under this Policy are provided by the User by filling out special forms on the Site and may include the following information:<br>
•	Username;<br>
•	E-mail;<br>
•	Wallet numbers in payment systems (for cash payments).<br>
•	The site administration is also making efforts to protect Personal Data that is automatically transmitted during the visit to the site pages:<br>

1.	Device Type;<br>
2.	IP address;<br>
3.	Information from cookies;<br>
4.	Information about the User's browser;<br>
5.	Access time and duration;<br>
6.	Visited page URLs.<br>
The site collects statistics about the IP addresses of its visitors. This information is used to identify and resolve technical problems.<br><br>
</p>



<p>
<ul><li><big> <strong>Purpose of obtaining Personal Information</strong></big></li></ul>

The main goal of everyone who visits the site is the identification of the User, as well as access to the personal account of the site of registered members. Also important criteria are:<br>
1. Establishing feedback with the User, including sending notifications and requests regarding the use of the site, the provision of services, processing requests and applications from the User.<br>
2. Locating the User for security and fraud prevention.<br>
3. Confirmation of the accuracy and completeness of personal data provided by the User.<br>
4. Providing the User with effective technical support in case of problems related to the use of the site.<br>
5. Providing the User, with his consent, of special offers, newsletters and other information on behalf of the site.<br>
6. Providing the User with access to third-party sites or services of partners of this site in order to receive their offers, updates or services.<br><br>
</p>



<p>
<ul><li><big> <strong>Methods and terms of processing personal information</strong></big></li></ul>

1. The processing of the User's personal data is carried out without any time limit, and in any legal way, including in personal data information systems with or without automation tools.<br>
2. The User's personal data can be transferred to the authorized state authorities only in the manner prescribed by law and under the circumstances established by law.<br><br>
</p>



<p>
<ul><li><big> <strong>Responsibility of the parties</strong></big></li></ul>

1. The site administration is responsible for the deliberate disclosure of the User's Personal Data in accordance with the current legislation, except for the cases described by the legislation of the country in which the user operates.<br>
2. In case of loss or disclosure of Personal Data, the Site Administration is not responsible if this confidential information:<br>
•	Was received from a third party before it was received by the Site Administration.<br>
•	Was obtained by third parties through unauthorized access to site files.<br>
•	Was disclosed with the consent of the User.<br>
•	The user is fully responsible for compliance with the legal requirements, including laws on advertising, on the protection of copyright and related rights, on the protection of trademarks and service marks, but not limited to the above, including full responsibility for the content and form of materials.<br><br>
</p>



<p>
<ul><li><big> <strong>Dispute Resolution</strong></big></li></ul>

1. Before going to court with a claim for disputes arising from the relationship between the Site User and the Site Administration, it is mandatory to submit a claim (proposals in electronic form for a voluntary settlement of the dispute).<br>
2. The recipient of the claim electronically notifies the claimant about the results of the consideration of the claim within 30 calendar days from the date of receipt of the claim.<br>
3. If the parties failed to reach an agreement, the dispute will be referred to a judicial authority in accordance with applicable law.<br><br>
</p>



<p>
<ul><li><big> <strong>Additional Terms</strong></big></li></ul>

The Site reserves the right to make changes to the Privacy Policy without further notice. The innovations come into force from the moment of their publication. Users can track changes to the Privacy Policy on their own.<br><br>
</p>



<p>
<ul><li><big> <strong>Use of personal information</strong></big></li></ul>
Personal information can be disclosed in cases described by law, or when the administration considers such actions necessary to comply with the legal procedure, court order or legal process necessary for the User to work with the Site. In other cases, under no circumstances, the information that the User transmits to the Site will not be disclosed to third parties.<br><br>
</p>



                </div>
              </div>
            </section>
       <div id="button-up">
        <i class="fa fa-chevron-up"></i>	
    </div>    <link rel="stylesheet" href="https:/cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	    #button-up{
display: none;
position: fixed;
right: 20px;
bottom: 60px;
color: #000;
background-color: white;
text-align: center;
font-size: 30px;
padding: 3px 10px 10px 10px;
transition: .3s;
border-radius: 50px;
width: 50px;
height: 50px;
z-index: 9999;
    }
     
    #button-up:hover{
      cursor: pointer;
      background-color: #E8E8E8;
      transition: .3s;
    }
	</style>
	    <script>
    $(document).ready(function() { 
      var button = $('#button-up');	
      $(window).scroll (function () {
        if ($(this).scrollTop () > 300) {
          button.fadeIn();
        } else {
          button.fadeOut();
        }
    });	 
    button.on('click', function(){
    $('body, html').animate({
    scrollTop: 0
    }, 800);
    return false;
    });		 
    });
    </script><script ></script>


    
@endsection

@section('scripts')
@parent

@endsection