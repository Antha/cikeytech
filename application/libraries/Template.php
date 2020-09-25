<?php 

class Template {
	protected $_ci;

	function __construct(){
		$this->_ci = &get_instance();
		$this->_ci->load->model('M_Saldo');
	}

	public function loadpage($page,$data){   
		$data["titlebrowser"] = "ATAP KITA";
        $data["judul_halaman"] = "";
        $data["halaman"] = $page;
        if ($page == "campaign/campaign_now") {
            $data["judul_halaman"] = "Galang Dana | ";
        }
        elseif ($page == "about-us") {
            $data["judul_halaman"] = "Tentang Kami | ";
        }
        elseif ($page == "faq") {
            $data["judul_halaman"] = "FAQ | ";
        }
        elseif ($page == "account/profile_look") {
            $data["judul_halaman"] = "Profile Saya | ";
        }
		isset($_SESSION["ID"]) ? $data["query_user"] = $this->_ci->M_Account->profile_retrieve(array('ID'=>$_SESSION["ID"])) : null;
	
		//GLOBAL FORMULA
		if(!isset($data["js_category"])){
          $data["js_category"] = "";   
        }
       
        if(!isset($data["js_orderby"])){
          $data["js_orderby"] = "";   
        }
        
        if(!isset($data["js_search"])){
          $data["js_search"] = "";   
        }
        //===========END OF GLOBAL FORMULA
		
		$this->_ci->load->view('header',$data);
		$this->_ci->load->view($page,$data);
		$this->_ci->load->view('footer',$data);
	}
	
	public function loadpage_Admin($page,$data){   
		$data["titlebrowser"] = "ATAP KITA";
		$this->_ci->load->view('adminahasaatap/header',$data);
		$this->_ci->load->view($page,$data);
		$this->_ci->load->view('adminahasaatap/footer',$data);
	}
}

?>
