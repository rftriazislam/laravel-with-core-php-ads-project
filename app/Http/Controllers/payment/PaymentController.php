<?php

namespace App\Http\Controllers\payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transanction;
use App\User;



class PaymentController extends Controller
{
    protected $merchant_username;
    protected $merchant_password;
    protected $client_ip;
    protected $merchant_key_prefix;
    protected $tx_id;


    public function __construct()
    {
        $this->merchant_username = "unistag";
        $this->merchant_password = "miDXB57XSwBn";
        $this->client_ip = $this->getUserIP();

        // $this->client_ip = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';
        $this->merchant_key_prefix = "UNT";
    }

    public  function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }




    public function generateTxId($unique_id = null)
    {
        if ($unique_id) {
            $tx_id = $this->merchant_key_prefix . $unique_id . 'UD' . uniqid();
        } else {
            $tx_id = $this->merchant_key_prefix . uniqid() . '_DP';
        }
        $this->tx_id = $tx_id;
        return $tx_id;
    }

    public function paymentresponse(Request $request)
    {


        $response_encrypted = $request->spdata;
        $response_decrypted = file_get_contents("https://shurjopay.com/merchant/decrypt.php?data=" . $response_encrypted);
        $response_data = simplexml_load_string($response_decrypted) or die("Error: Cannot create object");
        $success_url = $request->get('success_url');

        $tx_id = $response_data->txID;
        $trans_info = Transanction::where('tx_id', $tx_id)->first();
        // echo $response_data->bankTxStatus;
        // echo $response_data->txnAmount;
        // echo $response_data->spCode;
        // echo $response_data->spCodeDes;
        // echo $response_data->txID;
        $trans_info->update([
            'transaction_status' => ($response_data->spCode == '000') ? 'Success' : 'Fail'
        ]);
        if ($response_data->spCode == '000') {

            $succes_payment = Transanction::where('tx_id', $tx_id)->where('transaction_status', 'Success')->first();

            if ($succes_payment->user_id != 'new user') {
                $user_active = User::where('id', $succes_payment->user_id)->first();
                $user_active->update([
                    'active' => 1
                ]);
            }


            return redirect()->route('payment_issue_apps', ['message' => 'success', 'pid' => '123']);
        } else {
            return redirect()->route('payment_issue_apps', ['message' => 'fail', 'pid' => '321']);
        }
    }



    public function payment_issue(Request $request)
    {

        $message = $request->message;

        return view('payment.payment', compact('message'));
    }

    public function payment_phone($phone, $email)
    {
        $email = $email;
        $phone = $phone;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $message = 'Invalid email format ';
            return view('payment.payment_error', compact('message'));
        }
        //add new
        $user_active = User::where('email', $email)->first();
        //add new
        if (!empty($user_active)) {

            $message = 'Already email taken';
            return view('payment.payment_error', compact('message'));
        } else {


            $tran = Transanction::where('phone', $phone)->where('email', $email)->where('transaction_status', 'Success')->first();

            if ($tran) {

                return redirect()->route('payment_issue_apps', ['message' => 'success', 'pid' => '123']);
            } else {
                return view('payment.payment_phone', compact('phone', 'email'));
            }
        }
    }
    public function payment_inactive($id, $phone, $email)
    {
        $email = $email;
        $phone = $phone;
        $id = $id;

        $tran = Transanction::where('phone', $phone)->where('email', $email)->where('transaction_status', 'Success')->first();
        if ($tran) {
            return redirect()->route('payment_issue_apps', ['message' => 'success', 'pid' => '123']);
        } else {
            return view('payment.payment_active', compact('id', 'phone', 'email'));
        }
    }

    public function paymentcomplete(Request $request)
    {

        $email = $request->email;
        $phone = $request->phone;
        $id = $request->user_id;

        $tran = Transanction::where('phone', $phone)->where('email', $email)->where('transaction_status', 'Success')->first();

        if ($tran) {

            return redirect()->route('payment_issue_apps', ['message' => 'success', 'pid' => '123']);
        } else {

            $prc = 500;

            $price =  round($prc, 2);

            $tx_id = $this->generateTxId($request->product_id);
            $return_url = 'https://dreamploy.com/api/payment-response';
            $xml_data = 'spdata=
        <?xml version="1.0" encoding="utf-8"?>
<shurjoPay>
    <merchantName>' . $this->merchant_username . '</merchantName>
    <merchantPass>' . $this->merchant_password . '</merchantPass>
    <userIP>' . $this->client_ip . '</userIP>
    <uniqID>' . $this->tx_id . '</uniqID>

    <totalAmount>' . $price . '</totalAmount>
    <paymentOption>shurjopay</paymentOption>
    <returnURL>' . $return_url . '</returnURL>
</shurjoPay>';

$url = "https://shurjopay.com/sp-data.php";
$xml = $xml_data;
$stream_options = array(
'http' => array(
'method' => 'POST',
'header' => "Content-type: application/x-www-form-urlencoded\r\n",
'content' => $xml,
),
);

$context = stream_context_create($stream_options);
$response = file_get_contents($url, null, $context);

$trans_order = new Transanction();
$trans_order->tx_id = $tx_id;
$trans_order->user_id = $id;
$trans_order->price = $price;
$trans_order->phone = $phone;
$trans_order->email = $email;

$trans_order->transaction_status = 'init';
$trans_order->save();

$html = '
<!DOCTYPE html>
<html>

<body>
    ' . $response . '
</body>

</html>
';

if ($response) {
return $html;
} else {

return 'error';
}
}
}

public function chat()
{
return view('app-chat.index');
}


public function useractive($id)
{
$data = User::where('id', $id)->where('active', 1)->get();
$data_in = User::select(['id', 'email', 'phonenumber'])->where('id', $id)->where('active', 0)->first();
if (count($data) > 0) {
return response()->json(['success' => true, 'active' => 1, 'email' => null, 'phone' => null], 200);
} else {
if (count($data_in) > 0) {
return response()->json(
['success' => false, 'active' => 0, 'email' => $data_in->email, 'phone' => $data_in->phonenumber],
200
);
} else {
return response()->json(['success' => false, 'message' => 'Inactive user'], 400);
}
}
}
}