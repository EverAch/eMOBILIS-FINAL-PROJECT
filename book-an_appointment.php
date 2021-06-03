<?php

  $receiving_email_address = 'evekamuras@gmail.com.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $book_an_appointment = new PHP_Email_Form;
  $book_an_appointment->ajax = true;
  
  $book_an_appointment->to = $receiving_email_address;
  $book_an_appointment->from_name = $_POST['name'];
  $book_an_appointment->from_email = $_POST['email'];
  $book_an_appointment->subject = "New appointment booking request from the website";


  $book_an_appointment->add_message( $_POST['name'], 'Name');
  $book_an_appointment->add_message( $_POST['email'], 'Email');
  $book_an_appointment->add_message( $_POST['phone'], 'Phone', 4);
  $book_an_appointment->add_message( $_POST['date'], 'Date', 4);
  $book_an_appointment->add_message( $_POST['time'], 'Time', 4);
  $book_an_appointment->add_message( $_POST['sessions'], '# of sessions', 1);
  $book_an_appointment->add_message( $_POST['message'], 'Message');

  echo $book_an_appointment->send();
?>
