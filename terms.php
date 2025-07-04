<?php
    include_once "connection.php";

    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Escape Bay</title>
    <link rel="stylesheet" href="res.css">
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.20/dist/lenis.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="background"></div>
    <div class="main">
        <?php
            include_once "login.php";
        ?>
        <div class="page1" id="page1">
            <?php
                include_once "navbar.php";
            ?>
            <div class="blanknav"></div>
            <div class="enquirydate">
                <div class="enquirytext">
                    <h1>TERMS & CONDITIONS</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="terms">
                <h3>TERMS OF USE</h3>
                <ol>
                    <li><h4>Acceptance of Terms of Use and Amendments.</h4> <br><br>
                        <p>Each time you use or cause access to this website, you agree to be bound by these Terms of Use, and as amended from time to time with or without notice to you. In addition, if you are using a particular service on or through this web site, you will be subject to any rules or guidelines applicable to those services and they shall be incorporated by reference into these Terms of Use. Please see our Privacy Policy, which is incorporated into these Terms of Use by reference.</p><br><br>
                    </li>
                    <li><h4>Our Service</h4><br><br>
                        <p>Our web site and services provided to you on and through our website on an “AS IS” basis. You agree that the owners of this web site exclusively reserve the right and may, at any time and without notice and any liability to you, modify or discontinue this web site and its services or delete the data you provide, whether temporarily or permanently. We shall have no responsibility or liability for the timeliness, deletion, failure to store, inaccuracy, or improper delivery of any data or information.</p><br><br>
                    </li>
                    <li><h4>Your Responsibilities and Registration Obligations.</h4> <br><br>
                        <p>In order to use this website, you need to register personal information on our site, agree to provide truthful information when requested, and be at least the age of eighteen (18) or older. When registering, you explicitly agree to our Terms of Use and as may be modified by us from time to time and available here.</p><br><br>
                    </li>
                    <li><h4>Privacy Policy.</h4> <br><br>
                        <p>Registration data and other personally identifiable information that we may collect are subject to the terms of our Privacy Policy.</p><br><br>
                    </li>
                    <li><h4>Registration and Password.</h4> <br><br>
                        <p>You are responsible to maintain the confidentiality of your user ID and password, if applicable, and shall be responsible for all uses via your registration and/or login, whether authorized or unauthorized by you. You agree to immediately notify us of any unauthorized use or your registration, account, or password.</p><br><br>
                    </li>
                    <li><h4>Your Conduct.</h4> <br><br>
                        <p>You agree that all information or data of any kind, whether text, photographs or graphics, video, or other materials (“Content”), publicly or privately provided, shall be the sole responsibility of the person providing the Content or the person whose user account is used. You agree that our web site may expose you to Content that may be objectionable or offensive. We shall not be responsible to you in any way for the Content that appears on this website nor for any error or omission. <br>
                            You explicitly agree, in using this website or any service provided, that you shall not: <br>
                            <ol type="a">
                                <li>provide any Content or perform any conduct that may be unlawful, illegal, threatening, harmful, abusive, harassing, stalking, tortious, defamatory, libelous, vulgar, obscene, offensive, objectionable, pornographic, designed to or does interfere or interrupt this web site or any service provided, infected with a virus or other destructive or deleterious programming routine, give rise to civil or criminal liability, or which may violate an applicable local, national or international law;</li>
                                <li>impersonate or misrepresent your association with any person or entity, or forge or otherwise seek to conceal or misrepresent the origin of any Content provided by you;</li>
                                <li>collect or harvest any data about other users;</li>
                                <li>provide or use this web site and any Content or service in any commercial manner or in any manner that would involve junk mail, spam, chain letters, pyramid schemes, or any other form of unauthorized advertising without our prior written consent;</li>
                                <li>provide any Content that may give rise to our civil or criminal liability or which may constitute or be considered a violation of any local, national or international law, including but not limited to laws relating to copyright, trademark, patent, or trade secrets.</li>
                            </ol> 

                        </p><br><br>
                    </li>
                    <li><h4>Submission of Content on this Web Site.</h4> <br><br>
                        <p>By providing any Content to our web site: <br>
                            <ol type="a">
                                <li>you agree to grant to us a worldwide, royalty-free, perpetual, non-exclusive right and license (including any moral rights or other necessary rights) to use, display, reproduce, modify, adapt, publish, distribute, perform, promote, archive, translate, and to create derivative works and compilations, in whole or in part. Such license will apply with respect to any form, media, technology known or later developed;</li>
                                <li>you warrant and represent that you have all legal, moral, and other rights that may be necessary to grant us with the license set forth in this Section 7;
                                </li>
                                <li>you acknowledge and agree that we shall have the right (but not obligation), in our sole discretion, to refuse to publish or to remove or block access to any Content you provide at any time and for any reason, with or without notice.</li>
                            </ol>

                        </p><br><br>
                    </li>
                    <li><h4>Third Party Services.</h4> <br><br>
                        <p>Goods and services of third parties may be advertised and/or made available on or through this web site. Representations made regarding products and services provided by third parties are governed by the policies and representations made by these third parties. We shall not be liable for or responsible in any manner for any of your dealings or interaction with third parties.</p><br><br>
                    </li>
                    <li><h4>Indemnification.</h4> <br><br>
                        <p>You agree to indemnify and hold us harmless, our subsidiaries, affiliates, related parties, officers, directors, employees, agents, independent contractors, advertisers, partners, and co-branders from any claim or demand, including reasonable attorney’s fees, that may be made by any third party, that is due to or arising out of your conduct or connection with this web site or service, your provision of Content, your violation of this Terms of Use or any other violation of the rights of another person or party.</p><br><br>
                    </li>
                    <li><h4>DISCLAIMER OF WARRANTIES.</h4> <br><br>
                        YOU UNDERSTAND AND AGREE THAT YOUR USE OF THIS WEB SITE AND ANY SERVICES OR CONTENT PROVIDED (THE “SERVICE”) IS MADE AVAILABLE AND PROVIDED TO YOU AT YOUR OWN RISK. IT IS PROVIDED TO YOU “AS IS” AND WE EXPRESSLY DISCLAIM ALL WARRANTIES OF ANY KIND, IMPLIED OR EXPRESS, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. <br><br>
                        WE MAKE NO WARRANTY, IMPLIED OR EXPRESS, THAT ANY PART OF THE SERVICE WILL BE UNINTERRUPTED, ERROR-FREE, VIRUS-FREE, TIMELY, SECURE, ACCURATE, RELIABLE, OF ANY QUALITY, NOR THAT ANY CONTENT IS SAFE IN ANY MANNER FOR DOWNLOAD. YOU UNDERSTAND AND AGREE THAT NEITHER US NOR ANY PARTICIPANT IN THE SERVICE PROVIDES PROFESSIONAL ADVICE OF ANY KIND AND THAT USE OF SUCH ADVICE OR ANY OTHER INFORMATION IS SOLELY AT YOUR OWN RISK AND WITHOUT OUR LIABILITY OF ANY KIND.<br><br>
                        Some jurisdictions may not allow disclaimers of implied warranties and the above disclaimer may not apply to you only as it relates to implied warranties.
                        <p></p><br><br>
                    </li>
                    <li><h4>LIMITATION OF LIABILITY.</h4> <br><br>
                        <p>YOU EXPRESSLY UNDERSTAND AND AGREE THAT WE SHALL NOT BE LIABLE FOR ANY DIRECT, INDIRECT, SPECIAL, INDICENTAL, CONSEQUENTIAL OR EXEMPLARY DAMAGES, INCLUDING BUT NOT LIMITED TO, DAMAGES FOR LOSS OF PROFITS, GOODWILL, USE, DATA OR OTHER INTANGIBLE LOSS (EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES), RESULTING FROM OR ARISING OUT OF (I) THE USE OF OR THE INABILITY TO USE THE SERVICE, (II) THE COST TO OBTAIN SUBSTITUTE GOODS AND/OR SERVICES RESULTING FROM ANY TRANSACTION ENTERED INTO ON THROUGH THE SERVICE, (III) UNAUTHORIZED ACCESS TO OR ALTERATION OF YOUR DATA TRANSMISSIONS, (IV) STATEMENTS OR CONDUCT OF ANY THIRD PARTY ON THE SERVICE, OR (V) ANY OTHER MATTER RELATING TO THE SERVICE.</p><br><br>
                    </li>
                    <li><h4>Reservation of Rights.</h4> <br><br>
                        <p>We reserve all of our rights, including but not limited to any and all copyrights, trademarks, patents, trade secrets, and any other proprietary right that we may have in our web site, its content, and the goods and services that may be provided. The use of our rights and property requires our prior written consent. We are not providing you with any implied or express licenses or rights by making services available to you and you will have no rights to make any commercial uses of our web site or service without our prior written consent.</p><br><br>
                    </li>
                    <li><h4>Notification of Copyright Infringement.</h4> <br><br>
                        <p>If you believe that your property has been used in any way that would be considered copyright infringement or a violation of your intellectual property rights, our copyright agent may be contacted at the email address shown on the website.</p><br><br>
                    </li>
                    <li><h4>Applicable Law.</h4> <br><br>
                        <p>You agree that this Terms of Use and any dispute arising out of your use of this website or our products or services shall be governed by and construed in accordance with local laws where the headquarters of the owner of this web site is located, without regard to its conflict of law provisions. By registering or using this web site and service you consent and submit to the exclusive jurisdiction and venue of the county or city where the headquarters of the owner of this web site is located.
                        </p><br><br>
                    </li>
                    <li><h4>Miscellaneous Information.</h4> <br><br>
                        <p>
                            <ol type="i">
                                <li>In the event that this Terms of Use conflicts with any law under which any provision may be held invalid by a court with jurisdiction over the parties, such provision will be interpreted to reflect the original intentions of the parties in accordance with applicable law, and the remainder of this Terms of Use will remain valid and intact</li>
                                <li>The failure of either party to assert any right under this Terms of Use shall not be considered a waiver of any that party’s right and that right will remain in full force and effect</li>
                                <li>You agree that without regard to any statue or contrary law that any claim or cause arising out of this web site or its services must be filed within one (1) year after such claim or cause arose or the claim shall be forever barred</li>
                                <li>We may assign our rights and obligations under this Terms of Use and we shall be relieved of any further obligation.</li>
                            </ol>
                        </p><br><br>
                    </li>
  
                </ol>
            </div>
        </div>
        <?php
            include_once "footer.php";
        ?>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
</body>
</html>