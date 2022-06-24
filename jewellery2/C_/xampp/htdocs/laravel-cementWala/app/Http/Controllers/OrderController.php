<?php

namespace App\Http\Controllers;
use session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use Log;
use Illuminate\Support\Str;
use DB;
use Redirect;
use App\adminmodel\Order1;
use App\adminmodel\Order2;
use App\adminmodel\Inventory;
use App\adminmodel\Cart2;
use App\adminmodel\Wallet;
use App\adminmodel\Wallet_txn;
use App\adminmodel\Admin_notification;






class OrderController extends Controller
{

  public function payment(Request $req)
  {

          //
    			// $req->validate([
          //
    			// 	'order_id' => 'required',
    			// 	'final_amt' => 'required',
          //
    			// ]);

          // $order_id = $req->input('order_id');
    			// $final_amt = $req->input('final_amt');
          $working_key="43FE2B8FFB06FB9F35F32A2AB58B02DF";
          $access_code='AVEW27II80AV83WEVA';
           $order_id = session('order1_id');
           // echo $order_id;
           // exit;
  $order_data= Order1::wherenull('deleted_at')->where('id', $order_id)->first();
           $final_amt= $order_data->final_amount;
          $currency= "&amp;currency=INR";
          $language = "EN";
          // $tid = bin2hex(random_bytes(10));
          $tid = rand(10,100000000000000);
          $redirect_url=base_path."payment_status";
          $cancel_url=base_path."payment_status";
          $mid = WEB_MID;

$merchant_data="tid=".$tid."&merchant_id=".$mid."&"."order_id=".$order_id."&"."amount=".$final_amt."&currency=INR&".'redirect_url='.$redirect_url."&"."cancel_url=".$cancel_url."&"."language=".$language;


// echo $merchant_data;
// exit;

// $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
$encrypted_data = $this->encrypt($merchant_data,$working_key);
// $encrypted_data="";
$order1update =[
  'txnid'=>	$tid

];

$updated_last_id = Order1::where('id', $order_id)->first();
$updated_last_id->update($order1update);
// Method for encrypting the data.
// print_r($encrypted_data);
// print_r($encrypted_data);
// exit;
return view('frontend/payment',['enc_data' => $encrypted_data,'access_code'=>$access_code]);



  }


  public function payment_status(Request $req)
  {
    // echo "hi";
    // exit;
  $method = $req->method();
  if ($req->isMethod('post'))
  {

    $workingKey='43FE2B8FFB06FB9F35F32A2AB58B02DF';		//Working Key should be provided here.
    $access_code='AVEW27II80AV83WEVA';

  	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
  	$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
    // print_r($rcvdString);
    // exit;
  	$order_status="";
  	$decryptValues=explode('&', $rcvdString);
    // print_r($decryptValues);
    // exit;

$orderid=$decryptValues[0];
$bank_ref_no=$decryptValues[2];
$order_status=$decryptValues[3];
$payment_mode=$decryptValues[5];
$amount=$decryptValues[10];

$orderid=(explode("=",$orderid));
$bank_ref_no=(explode("=",$bank_ref_no));
$order_status=(explode("=",$order_status));
$payment_mode=(explode("=",$payment_mode));
$amount=(explode("=",$amount));

$merchant_json_data =
    array(
    'order_no' => $orderid[1],
	// 'reference_no' =>$bank_ref_no[1]
);
// print_r($merchant_json_data);
// exit;
$merchant_data = json_encode($merchant_json_data);
$encrypted_data = $this->encrypt($merchant_data, $workingKey);
// print_r($encrypted_data);


$final_data = 'enc_request='.$encrypted_data.'&access_code=AVEW27II80AV83WEVA&command=orderStatusTracker&request_type=JSON&response_type=JSON';


// print_r($final_data);

// $headers = array(
//             'Content-Type: application/json');
if(GATWAY==0){
	$URL="https://apitest.ccavenue.com/apis/servlet/DoWebTrans";
}else{
	$URL="https://api.ccavenue.com/apis/servlet/DoWebTrans";
}


$ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "https://apitest.ccavenue.com/apis/servlet/DoWebTrans");//FOR TEST
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
// curl_setopt($ch, CURLOPT_HTTPHEADER,$headers) ;
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $final_data);
// Get server response ...
$result = curl_exec($ch);
// print_r($result);
// exit;
curl_close($ch);
$status = '';
$information = explode('&', $result);

$dataSize = sizeof($information);
for ($i = 0; $i < $dataSize; $i++) {
    $info_value = explode('=', $information[$i]);
    if ($info_value[0] == 'enc_response') {
	$status = $this->decrypt(trim($info_value[1]), $workingKey);

    }
}

// echo 'Status revert is: ' . $status.'<pre>';
 // $obj = json_decode($status);
 // $ddws=$obj->Order_Status_Result;
 //  print_r($ddws->order_status);
 //
 // exit;
//  print_r($obj);
// exit;

  	if($order_status[1]==="Success")
  	{


      $invoice_data = Order1::where('payment_status', 1)->orderBy('id','DESC')->first();


      if(!empty($invoice_data->invoice_no)){
      if($invoice_data->invoice_no==NULL){
        $invoice_no = 1;
      }else{
        $invoice_no = $invoice_data->invoice_no + 1;
      }
      }else{
        $invoice_no = 1;
      }

        $order1update1 =[
          'payment_type'=>	2,
          'bank_ref_no' => $bank_ref_no[1],
          'payment_mode' => $payment_mode[1],
          'final_amount' => $amount[1],
          'payment_status'=>1,
          'order_status'=>1,
          'invoice_no' => $invoice_no,


        ];

        $updated_last_id1 = Order1::where('id', $orderid[1])->first();
        $updated_last_id1->update($order1update1);

$order_data= Order1::where('id', $orderid[1])->first();
$user_id= $order_data->user_id;


///---update wallet------
        $wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_id,'is_active'=>1))->first();

        $update_wallet = $wallet_data->wallet_amount - $order_data->wallet_discount;

        //---update wallet amount---

        $wallet_update =[
        'wallet_amount'=>$update_wallet
        ];


        $updated_last_id2 = Wallet::where('user_id', $user_id)->first();
        $updated_last_id2->update($wallet_update);

        //----create wallet transation------
        $order1=Order1::where('user_id', $user_id)->orderBy('id','DESC')->first();
        $wallet_txt =[
        'user_id'=>$user_id,
        'order_id'=>$orderid[1],
        'wallet_discount'=>$order_data->wallet_discount,
        ];

        $wallet_txn_data =  Wallet_txn:: create($wallet_txt);


      //------update inventory---------

      $order2_data= order2::where('main_id', $orderid[1])->get();
        foreach ($order2_data as $order ) {

        $inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $order->type_id,'is_active'=>1))->first();


               $inventory= $inventory_data->quantity-$order->quantity;

                $inventry_update =[
                        'quantity'=>$inventory
                      ];

                      $updated_last_id5 = Inventory::where('producttype_type', $order->type_id)->first();
                      $updated_last_id5->update($inventry_update);

        }//end foreach

      //-------empty cart--------

      $delete = Cart2::where('user_id' ,$user_id)->delete();

      //----sent push notification to admin---------

          $url = 'https://fcm.googleapis.com/fcm/send';

          $title="New Order";
          $message="Order recieved of amount:-".$amount[1]." and order id:- ".$orderid[1]" ";


          $msg2 = array(
            'title'=>$title,
          'body'=>$message,
          "sound" => "default"

          );

          $fields = array(
          // 'to'=>"/topics/all",
          'to'=>"/topics/weather",
          'notification'=>$msg2,
          'priority'=>'high'
          );

          $fields = json_encode ( $fields );

          $headers = array (
          'Authorization: key=' . AUTHORIZATION_KEY_PUSH_ADMIN,
          'Content-Type: application/json'
          );

          $ch = curl_init ();
          curl_setopt ( $ch, CURLOPT_URL, $url );
          curl_setopt ( $ch, CURLOPT_POST, true );
          curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
          curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
          curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

          $result = curl_exec ( $ch );
          // echo $fields;
          // echo $result;
          curl_close ( $ch );

          $notification =[
          'title'=>$title,
          'message'=>$message,
          'ip'=>$req->ip(),
          ];

          $notification_data = Admin_notification :: create($notification);



      return view('frontend/order_success',['order_id'=>$orderid[1],'amount'=>$amount[1]]);


  	}
  	else if($order_status[1]==="Aborted")
  	{
  		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";

  	}
  	else if($order_status[1]==="Failure")
  	{
      return view('frontend/order_fail');

  	}
  	else
  	{
  		echo "<br>Security Error. Illegal access detected";

  	}

}else{

  return redirect('/');

}
  }



  function encrypt($plainText,$key)
	{
		// $key = hextobin(md5($key));
    $key = $this->hextobin(md5($key));

		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
		$encryptedText = bin2hex($openMode);
		return $encryptedText;
	}

	function decrypt($encryptedText,$key)
	{
		$key = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$encryptedText = $this->hextobin($encryptedText);
		$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
		return $decryptedText;
	}
	//*********** Padding Function *********************

	 function pkcs5_pad ($plainText, $blockSize)
	{
	    $pad = $blockSize - (strlen($plainText) % $blockSize);
	    return $plainText . str_repeat(chr($pad), $pad);
	}

	//********** Hexadecimal to Binary function for php 4.0 version ********

	function hextobin($hexString)
   	 {
        	$length = strlen($hexString);
        	$binString="";
        	$count=0;
        	while($count<$length)
        	{
        	    $subString =substr($hexString,$count,2);
        	    $packedString = pack("H*",$subString);
        	    if ($count==0)
		    {
				$binString=$packedString;
		    }

		    else
		    {
				$binString.=$packedString;
		    }

		    $count+=2;
        	}
  	        return $binString;
    	  }



}
