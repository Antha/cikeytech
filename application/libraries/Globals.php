<?php 

class Globals {
	protected $_ci;

	function __construct(){
		$this->_ci = &get_instance();
		$this->_ci->load->model('M_Account');
	}

	public function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
    }
    
    public function generateRandomInteger($length = 10) {
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
    }
    
    public function sendContentThroughEmail($text,$email_to,$subject){
    	$config['protocol'] = 'smtp';
    	$config['smtp_host'] = "us2.smtp.mailhostbox.com";
    	$config['smtp_port'] = "587";
    	$config['smtp_user'] = "info@atapkita.com";
    	$config['smtp_pass'] = "Atapkita123";
    	$config['charset'] = "utf-8";
    	$config['mailtype'] = "html";
    	$config['newline'] = "\r\n";
    	
		$mail_content = '<tr><td>
				<table cellspacing="0" cellpadding="0" border="0" align="center" style="max-width:600px;border-collapse:collapse;background-color:#ffffff;border:solid #e0e0e0 1px">

					
					<tbody><tr>
						<td style="padding:15px 25px 10px; background-color:#fdd12b">
							<table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse;color:#ffffff">
								<tbody><tr>
									<td width="210">
										<a href="https://atapkita.com"><img src="https://atapkita.com/assets/images/white-logo.png" alt="Logo" height="25" class="CToWUd"></a>
									</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				   '.$text.'
					<tr>
						<td style="padding:25px 25px 10px;background-color:#f2f3f4">
							<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse;font-size:13px;letter-spacing:0.2px;color:rgba(0,0,0,0.38)">
								<tbody><tr>
									<td style="padding:0px 0">Email ini otomatis dikirim oleh sistem. Mohon untuk tidak membalas email ini. Jika ada pertanyaan hubungi kami di Whatsapp 0812-3100-3500</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
					
					<tr>
						<td style="padding:0 24px 20px;background-color:#f2f3f4">
							<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;font-size:13px;color:#999999">
								<tbody><tr>
									<td>
										<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse">
											<tbody><tr>
												<td width="280" align="left">
													<table border="0" style="border-collapse:collapse;margin-top:10px">
														<tbody><tr>
															<td style="font-size:13px;color:#999999;margin-bottom:10px">Download Aplikasi Atapkita</span> <br></td>
														</tr>
														<tr>
															<td style="padding:2px"></td>
														</tr>
														<tr>
															<td>
																<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse">
																	<tbody><tr>
																		<td>
																			<a href="" style="padding:0 5px"><img src="https://atapkita.com/assets/images/gplay.png" alt="gplay" height="44"></a>
																		</td>
																	</tr>
																</tbody></table>
															</td>
														</tr>
													</tbody></table>
												</td>
											
											<td width="280" align="right">
													<table border="0" style="border-collapse:collapse;margin-top:10px">
														<tbody><tr>
															<td style="font-size:13px;color:#999999;margin-bottom:10px" align="right">Ikuti Kami</td>
														</tr>
														<tr>
															<td style="padding:2px"></td>
														</tr>
														<tr>
															<td>
																<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse:collapse">
																	<tbody><tr>
																		
																		<td>
																			<a href="https://www.facebook.com/atapkitacom.atapkitacom" style="padding:0 5px""><img src="https://atapkita.com/assets/images/fb-circle.png" height="44"></a>
																		</td>
																	<td>
																			<a href="https://www.instagram.com/atapkitacom/" style="padding:0 5px""><img src="https://atapkita.com/assets/images/ig-circle.png" height="44"></a>
																		</td><td>
																			<a href="https://twitter.com/atapkitacom" style="padding:0 5px""><img src="https://atapkita.com/assets/images/tw-circle.png" height="44"></a>
																		</td>
																	</tr>
																</tbody></table>
															</td>
														</tr>
													</tbody></table>
												</td>	
											</tr>
										</tbody></table>
									</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
					

					
					<tr>
						<td>
							<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse:collapse;background-color:#4c000a;font-size:13px;color:#999999;border-top:1px solid #dddddd">
								
								<tbody>
								<tr>
									<td width="560" align="center" style="padding:10px 20px 10px;color:white">
									2018 © All Rights Reserved by AtapKita.com
									</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
					

				</tbody></table>
				
			</td></tr>';
    	
        $this->_ci->email->initialize($config);
        $this->_ci->email->from('info@atapkita.com','Atapkita');
        $list = $email_to;
        $this->_ci->email->to($list);
        $this->_ci->email->subject($subject);
        $this->_ci->email->message($mail_content);
        
        
        if($this->_ci->email->send()){
            //echo "Email Sent";
        }else{
            //show_error($this->email->print_debugger());
        }
    }
    
    public function notification_insert($data){
        $this->_ci->M_Account->notification_insert($data);
    }
    
    function encrypt($data){
        $query_enc = $this->_ci->M_Account->getEncCode();
        foreach($query_enc->result_array() as $row){
            $nc_code = $row["Thecode"];
        }
        
        $token = $data;
        $cipher_method = 'aes-128-ctr';
        $enc_key = openssl_digest($nc_code, 'SHA256', TRUE);
        $enc_iv = 1000100010001000;
        //echo $enc_iv."<br/>";
        $crypted_token = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
        unset($token, $cipher_method, $enc_key, $enc_iv);
        return $crypted_token; 
    }
    
    function decrypt($data){
        if($data == ""){
            $token = "";
        }else{
            $query_enc = $this->_ci->M_Account->getEncCode();
            foreach($query_enc->result_array() as $row){
                $nc_code = $row["Thecode"];
            }
            
            $crypted_token = $data;
        	list($crypted_token, $enc_iv) = explode("::", $crypted_token);;
            $cipher_method = 'aes-128-ctr';
            $enc_key = openssl_digest($nc_code, 'SHA256', TRUE);
            $enc_iv = 1000100010001000;
            $token = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, $enc_iv);
            unset($crypted_token, $cipher_method, $enc_key, $enc_iv);
            return $token;
        }
    }
    
    function cekpostisnull($arraypost,$except){
        foreach($arraypost as $key => $value){
	        if($value == "" && !(in_array($key,$except))){
	            exit("There Is Null Value");
	        }
	    }
    }
    
    //==============================================
	//===============Cek Session====================
	//==============================================
	function cekSession($redirect_url = null){
	    if(isset($_COOKIES["ISLOGIN"])){
	        $_SESSION["ISLOGIN"] = 1;
        	$_SESSION["ID"]  = $_COOKIES["ID"];
        	$_SESSION["NAME"]  = $_COOKIES["NAME"];
            $_SESSION["EMAIL"]  = $_COOKIES["EMAIL"];
            $_SESSION["IMG_URL"]  = $_COOKIES["IMG_URL"];
	    }
	    
	    if(!isset($_SESSION["ISLOGIN"])){
	        if($redirect_url != null){
	           redirect($redirect_url);
	        }else{
	           redirect("Welcome/"); 
	        }
	    }else{
	        //Cek Cookies
	    }
	}
	
	function cekSession_Login($redirect_url = ""){
	    $_SESSION["redirect_url"] = base64_encode($redirect_url);
	    if(!isset($_SESSION["ISLOGIN"])){
	       redirect("Account/index/"); 
	    }
	}
	
	function cekSession_Admin_Login(){
	    if(!isset($_SESSION["IS_LOGIN_ADMIN"])){
	       redirect("/index/"); 
	    }
	}
	
	function secureValue($plain){
	    return addslashes(trim(htmlentities($plain, ENT_QUOTES, 'UTF-8')));
	}
}

?>