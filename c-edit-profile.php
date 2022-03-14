<?php require_once('header.php'); ?>

<?php 
if(!isset($_SESSION['customer']))
{
  header('location: login.php');
  exit;
}
?>

<?php
if(isset($_POST['form1']))
{
  $q = $pdo->prepare("UPDATE customer SET 
        cust_name=?, 
        cust_phone=?, 
        cust_email=? 
  
        WHERE cust_id=?
      ");
  $q->execute([ 
        $_POST['cust_name'],
        $_POST['cust_phone'],
        $_POST['cust_email'],
        $_SESSION['customer']['cust_id']
      ]);

  $_SESSION['customer']['cust_name'] = $_POST['cust_name'];
  $_SESSION['customer']['cust_phone'] = $_POST['cust_phone'];
  $_SESSION['customer']['cust_email'] = $_POST['cust_email'];

  $success_message = 'Profile information is updated successfully.';
}
?>

<!-- Parallax Effect -->
<script type="text/javascript">$(document).ready(function(){$('#parallax-pagetitle').parallax("50%", -0.55);});</script>

<section class="parallax-effect">
  <div id="parallax-pagetitle" style="background-image: url(images/parallax/parallax-01.jpg);">
    <div class="color-overlay"> 
      <!-- Page title -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li class="active">Edit Profile</li>
            </ol>
            <h1>Edit Profile</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="row">
    
     <section class="contact-details">
      <div class="col-md-3">
        <h2 class="lined-heading  mt50"></h2>
        <!-- Panel -->
        <div class="panel panel-default text-center">
          <div class="panel-body">
            <?php require_once('c-sidebar.php'); ?>
          </div>
        </div>
      </div>
    </section>


    <section id="contact-form" class="mt50">
      <div class="col-md-9">
        
        <?php
        if($error_message) {
          ?><script>alert('<?php echo $error_message; ?>');</script><?php
        }

        if($success_message) {
          ?><script>alert('<?php echo $success_message; ?>');</script><?php
        }
        ?>

        <form class="clearfix" method="post" action="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name"><span class="required">*</span> Name</label>
                <input name="cust_name" type="text" class="form-control" value="<?php echo $_SESSION['customer']['cust_name']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name"> Phone Number</label>
                <input name="cust_phone" type="text" class="form-control" value="<?php echo $_SESSION['customer']['cust_phone']; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name"><span class="required">*</span> Email Address</label>
                <input name="cust_email" type="text" class="form-control" value="<?php echo $_SESSION['customer']['cust_email']; ?>">
              </div>
            </div>
          </div>
          <button type="submit" class="btn  btn-lg btn-primary" name="form1">Update</button>
        </form>


      </div>
    </section>
  </div>
</div>


<?php require_once('footer.php'); ?>