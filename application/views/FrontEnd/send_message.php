<?php
//echo "<pre>";
//print_r($_POST);
//die();

$sendEmail = "";

exit();

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sub = $_POST['subject'];
$info = $_POST['message'];



$message = '<html><body>';
$message .= '<h3 style="color:#297db4; ">' . "Form: " . "$email".'</h3>';
$message .= '<h3 style="color:#297db4; ">' . "Subject : " . "$sub".'</h3>';

$message .= '<p style="color:#080; font-size: 18px; "><br/>'. "$info".'</p>';

$message .= '<h3 style="color:#297db4; ">' . "Name : " . "$name".'</h3>';

$message .= '<h3 style="color:#297db4; ">' . "Phone: " . "$phone".'</h3>';

$message .= '</html></body>';


$headers = "Form: " . strip_tags($email) . "\r\n";
$headers .= "Reply-To: " . strip_tags($email) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$isSuccess = mail($sendEmail, 'Residential Security and Access', $message, $headers);
if($isSuccess){
    //header('Location: https://oshit.totbd.com/ContactMe');
    //return redirect('/ContactMe')->with('message', 'Your message has been send. Thank You ');
    $data['message']="Your message has been send. Thank You!";
	$this->session->set_flashdata($data);
	redirect('ContactUs');
}
else{
    //header('Location: https://oshit.totbd.com/ContactMe');
    //return redirect('/ContactMe')->with('message', 'Something went wrong !!! ');

    $data['message2']="Something went wrong !!! ";
	$this->session->set_flashdata($data);
	redirect('ContactUs');
}
?>
