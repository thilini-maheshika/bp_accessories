<?php
	include 'template/header.php';
	include 'template/dependencies.php';
?>
<!-- Contact Info -->

<div class="contact_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div
                    class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Phone</div>
                            <div class="contact_info_text"><?php echo $res['com_phone'] ?></div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Email</div>
                            <div class="contact_info_text"><?php echo $res['com_email'] ?></div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Address</div>
                            <div class="contact_info_text"><?php echo $res['com_address'] ?></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_form_container">
                    <div class="contact_form_title">Get in Touch</div>

                    <form method="post" novalidateenctype="multipart/form-data" id="productinfo">
                        <div
                            class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input type="text" name="name" id="contact_form_name" class="contact_form_name input_field"
                                placeholder="Enter Your name">
                            <input type="text" name="email" id="contact_form_email"
                                class="contact_form_email input_field" placeholder="Your email">
                            <input type="text" name="phone" id="contact_form_phone"
                                class="contact_form_phone input_field" placeholder="Your phone number">
                        </div>
                        <div class="contact_form_text">
                            <textarea id="contact_form_message" class="text_field contact_form_message" name="message"
                                rows="4" placeholder="Message"></textarea>
                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class="button contact_submit_button"
                                onclick="contactForm(this.form)">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <?php 
		include 'gallery.php';
	?>
    <!-- Gallery -->

    <!-- Map -->

    <div class="contact_map">
        <div id="google_map" class="google_map">
            <div class="map_container">
                <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.100765790619!2d79.9880149!3d6.87853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae251f75a088045%3A0x47317049c049208b!2sBp%20accessories!5e0!3m2!1sen!2slk!4v1665981141843!5m2!1sen!2slk" width="100%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
	include 'template/footer.php';	
?>