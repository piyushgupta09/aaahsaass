<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
	private $merchantId = "531352";

	public function show()
	{
		return view('checkout', [
			'datetime' => (new DateTime())->getTimestamp(),
			'merchantId' => $this->merchantId,
		]);
	}

    public function process()
    {	
		$merchant_data='';
		$working_key='2C1BBF861AFE333D8D4C03E4292DB2B9';//Shared by CCAVENUES
		$access_code='AVVT27II65AU73TVUA';//Shared by CCAVENUES
		
		foreach ($_POST as $key => $value){
			$merchant_data.=$key.'='.urlencode($value).'&';
		}

		$encrypted_data = $this->encrypt($merchant_data,$working_key); // Method for encrypting the data.

		return view('pay', [
			'encrypted_data' => $encrypted_data,
			'access_code' => $access_code
		]);

		// $response = Http::asForm()->post('https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction', [
		// 	'encrypted_data' => $encrypted_data,
		// 	'access_code' => $access_code,
		// ])->json();

		

    }

    public function response()
    {	
		$workingKey='2C1BBF861AFE333D8D4C03E4292DB2B9';		//Working Key should be provided here.
		$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
		$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);

		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
			if ($i==3) {
				$order_status=$information[1];
			}
		}

		switch ($order_status) {
			case 'Success':
				$response = "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
				break;

			case 'Aborted':
				$response = "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
				break;

			case 'Failure':
				$response = "<br>Thank you for shopping with us.However,the transaction has been declined.";
				break;

			default:
				$response = "<br>Security Error. Illegal access detected";
				break;
		}

		$res_info_1 = "";
		$res_info_2 = "";

		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
			$res_info_1 = $information[0];
			$res_info_2 = $information[1];
		}

		return view('success', [
			'response' => $response,
			'res_info_1' => $res_info_1,
			'res_info_2' => $res_info_2,
		]);

    }

	/*
	* @param1 : Plain String
	* @param2 : Working key provided by CCAvenue
	* @return : Decrypted String
	*/
	private function encrypt($plainText,$key)
	{
		$key = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
		$encryptedText = bin2hex($openMode);
		return $encryptedText;
	}

	/*
	* @param1 : Encrypted String
	* @param2 : Working key provided by CCAvenue
	* @return : Plain String
	*/
	private function decrypt($encryptedText,$key)
	{
		$key = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$encryptedText = $this->hextobin($encryptedText);
		$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
		return $decryptedText;
	}

	private function hextobin($hexString) 
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
