<?php
$q = $pdo->prepare("SELECT * FROM settings WHERE id=?");
$q->execute([1]);
$res = $q->fetchAll();
foreach ($res as $row) {
  $footer_address = $row['footer_address'];
  $footer_phone = $row['footer_phone'];
  $footer_email = $row['footer_email'];
  $footer_website = $row['footer_website'];
  $footer_copyright = $row['footer_copyright'];
  $footer_how_many_post = $row['footer_how_many_post'];
}
?>
<!-- </?php
if (isset($_POST['form_subscriber'])) {
  $valid = 1;
  if ($_POST['s_name'] == '') {
    $valid = 0;
    $error_message .= 'Name can not be empty\n';
  }
  if ($_POST['s_email'] == '') {
    $valid = 0;
    $error_message .= 'Email can not be empty\n';
  }

  if ($valid == 1) {
    $hash = md5(time());

    $q = $pdo->prepare("INSERT INTO subscriber (
        s_name,
        s_email,
        s_hash,
        s_active
      ) 
      VALUES (?,?,?,?)");
    $q->execute([
      $_POST['s_name'],
      $_POST['s_email'],
      $hash,
      0
    ]);

    require_once('mail/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

    try {

      $mail->SMTPSecure = "ssl";
      $mail->IsSMTP();
      $mail->SMTPAuth   = true;
      $mail->Host       = 'business32.web-hosting.com';
      $mail->Port       = '465';
      $mail->Username   = 'usa@commercialcleaningjanitorialserviceslosangeles.com';
      $mail->Password   = '63@n6#3)W.G%';

      $mail->addReplyTo('noreply@yourwebsite.com');
      $mail->setFrom('usa@commercialcleaningjanitorialserviceslosangeles.com');
      $mail->addAddress($_POST['s_email']);


      $mail->isHTML(true);
      $mail->Subject = 'Subscription Confirmation';

      $verify_link = '<a href="' . SITE_URL . 'verify_subscriber.php?email=' . $_POST['s_email'] . '&hash=' . $hash . '">' . SITE_URL . 'verify_subscriber.php?email=' . $_POST['s_email'] . '&hash=' . $hash . '</a>';

      $mail->Body = 'Please click on the link below to confirm the subscription:' . $verify_link;
      $mail->send();

      $success_message = 'Your subscription is completed. Please check your email address to follow the process to confirm the subscription.';
    } catch (Exception $e) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }
}
?> -->
<!-- </?php
if ($error_message) {
?><script>
alert('</?php echo $error_message; ?>');
</script></?php
          }

          if ($success_message) {
            ?><script>
alert('</?php echo $success_message; ?>');
</script></?php
          }
            ?> -->
<footer>
    <div class="container">
        <div class="row text-light">
            <div class="col-md-6 col-sm-6">
                <h3>About Sajek</h3>
                <h4>
                    <p>Sajek valley is 2000 feet above sea level. Sajek valley is known as the Queen of Hills & Roof of
                        Rangamati. The name of Sajek Valley came from Sajek River that originates from Karnafuli river.
                        Sajek river is working as a border between Bangladesh and India. Sajek valley resorts are made
                        on
                        the side of the hill to provide the unique experience of tribal lifestyle. <br>
                        <br>
                </h4>

            </div>
            <!-- <div class="col-md-4 col-sm-4">
                <h4>Get in Touch</h4>
                <p>Massage Me</p>

                <form role="form" action="" method="post">
                    <div class="form-group">
                        <input name="s_name" type="text" value="" class="form-control" placeholder="Full Name">
                        <input name="s_email" type="text" value="" class="form-control" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-lg btn-black btn-block" name="form_subscriber">Submit</button>
                </form>

            </div> -->

            <div class="col-md-6 col-sm-6">
                <!-- <h4>Address</h4>
                <address>
                    </?php echo nl2br($footer_address); ?><br>
                    <abbr title="Phone">P:</abbr> </?php echo $footer_phone; ?><br>
                    <abbr title="Email">E:</abbr> </?php echo $footer_email; ?><br>
                    <abbr title="Website">W:</abbr> </?php echo $footer_website; ?><br>
                </address> -->
                <!-- <h2 class="lined-heading  mt5"><span>Address</span></h2> -->
                <!-- Panel -->
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <div class="panel-title"><i class="fa fa-star"></i> <strong>Address</strong></div>
                    </div>
                    <div class="panel-body text-dark">
                        <h5>
                            <address>
                                <p>Phone No - 01923445509<br>
                                Email - sajekvalley@gmail.com<br>
                                Website-www.Sajekvalley.com</p>
                                <!-- <?php echo nl2br($footer_address); ?><br>

                                <abbr title="Phone">PHONE NO: </abbr> <?php echo $footer_phone; ?><br>
                                <abbr title="Email">EMAIL: </abbr> <?php echo $footer_email; ?><br>
                                <abbr title="Website">WEBSITE: </abbr> <?php echo $footer_website; ?><br> -->

                            </address>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-6"> <?php echo $footer_copyright; ?> </div>
                <div class="col-xs-6 text-right">
                    <ul>
                        <li><a href="contact-01.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
</footer>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

<script>
$(document).on('submit', '#stripe_form', function() {
    $('#submit-button').prop("disabled", true);
    $("#msg-container").hide();
    Stripe.card.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
        // name: $('.card-holder-name').val()
    }, stripeResponseHandler);
    return false;
});
Stripe.setPublishableKey('pk_test_0SwMWadgu8DwmEcPdUPRsZ7b');

function stripeResponseHandler(status, response) {
    if (response.error) {
        $('#submit-button').prop("disabled", false);
        $("#msg-container").html(
            '<div style="color: red;border: 1px solid;margin: 10px 0px;padding: 5px;"><strong>Error:</strong> ' +
            response.error.message + '</div>');
        $("#msg-container").show();
    } else {
        var form$ = $("#stripe_form");
        var token = response['id'];
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        form$.get(0).submit();
    }
}
</script>

</body>

</html>