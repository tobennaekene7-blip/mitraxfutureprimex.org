<?php

function getLicenseKey() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 35; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    $array = str_split($randomString, 7);
    return implode('-', $array);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Activate OnlineTrade</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css"/>
    <style type="text/css">
      body, html {
        background: #F7F7F7;
      }
    </style>
  </head>
  <body>
    <div class="container"> 
      <div class="section" >
        <div class="column is-6 is-offset-3">
          <center>
            <h1 class="title" style="padding-top: 20px">Activate OnlineTrader</h1><br>
          </center>
          <div class="box">
           <?php
            
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $login_link = str_replace('activate','adminlogin/login', $actual_link);
            $license_code = null;
            $client_name = null;
            if(!empty($_POST['license'])&&!empty($_POST['client'])){

              $license_code = strip_tags(trim($_POST["license"]));
              $client_name = strip_tags(trim($_POST["client"])); 
              
              $activate_response = $api->activate_license($license_code, $client_name);
              
              if(empty($activate_response)){
                $msg = 'Server is unavailable.';
              }else{
                $msg = $activate_response['message'];
              }
              if($activate_response['status'] != true){ ?>
                <form action="activate" method="POST">
                  <div class="notification is-danger"><?php echo ucfirst($msg); ?></div>
                  <div class="field">
                    <label class="label">License code</label>
                    <div class="control">
                      <input class="input" type="text" placeholder="enter your purchase/license code" name="license" required>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Your name</label>
                    <div class="control">
                      <input class="input" type="text" placeholder="enter your name/envato username" name="client" required>
                    </div>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div style='text-align: right;'>
                    <button type="submit" class="button is-link">Activate</button>
                  </div>
                </form><?php
              }else{ ?>
                <div class="notification is-success text-center" style='text-align: center;'>
                    <?php echo ucfirst($msg); ?>
                    <br>
                    Log in with the default super admin details,
                    <br>Username: <b>super@happ.com</b><br>Password: <b>test123</b>
                    <br>
                    <a href="<?php echo $login_link;?>" target="_blank">Login now</a>
                    </div>
              <?php
              }
            }else{ ?>
              <form action="activate" method="POST">
                <div class="field">
                  <label class="label">Auto generated license code</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="enter your purchase/license code" name="license" value="<?= getLicenseKey();?>" required readonly>
                  </div>
                </div>
                <div class="field">
                  <label class="label">Your name</label>
                  <div class="control">
                    <input class="input" type="text" placeholder="enter your name/babiato username" name="client" required>
                  </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div style='text-align: right;'>
                  <button type="submit" class="button is-link">Activate</button>
                </div>
              </form><?php 
            } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="content has-text-centered">
      <p>Copyright <?php echo date('Y'); ?> Brynamics, All rights reserved.</p><br>
      <?php echo str_rot13('<n uers="uggcf://AhyyWhatyr.pbz">Ahyyrq Ol AhyyWhatyr.pbz</n>');?> 
    </div>
  @include('partials.smartsupp')
</body>
</html>