<?php
function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from Allusers_table where user_id = '$id' limit 1";
        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    die;
}

function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'ABNKKBSNPLK'; // user define private key
    $secret_iv = 'mainsct'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

// echo "Your Encrypted password is = ". $pwd = encrypt_decrypt('spaceo', 'encrypt');
// echo "Your Decrypted password is = ". encrypt_decrypt($pwd, 'decrypt');

function qrdisplay($string){
	
    $link1 = "https://chart.googleapis.com/chart?cht=qr&chl=";
    $link3 = "&chs=160x160&chld=L|0";

    $qrcode = $link1 . $string . $link3;

    return $qrcode;

}

?> 
