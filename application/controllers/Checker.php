<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checker extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this
        //     ->load
        //     ->model('Model');

        // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        
    }
    public function index()
    {
        $this->load->view('checker');
        // echo var_dump($token);
        
    }
    public function check_key(){
        $token = 'gAAAAABfdVGlcwXmw7GVrdDbYxZOPgtSjeKEa6yGdMupdFFGW5I2GmbewlPuh2-c1GEH9n4oVITR32vhsAL8s1gey0w_2UC0eYgTNEzLyx-zj0qz7teKvqg=';
        $key_win = $this->input->post('KEY');
        
        $datakey = explode("\n", $key_win);

        foreach ($datakey as $key => $key_win_value) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://activationtool.com/public-api/check-key?key=".$key_win_value."&token=".$token."",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Cookie: __cfduid=d55481aeebd2c905e22dffc845ced4a741600913288; django_language=en"
                ) ,
            ));

            $response = curl_exec($curl);

            $data_array = json_decode($response, true);

            // echo var_dump($data_array);

            $save_data = explode("\n", $data_array);

            // echo var_dump($save_data);

            $attr = array();

            foreach ($save_data as $key => $value) {
                if($value != ""){
                    $pre2 = explode(": ",$value);
                    // echo var_dump($pre2);
                    $attr[$pre2[0]] = $pre2[1];
                    // $attr['$pre2[0]'] = $pre2[1];
                }
            }

            if(isset($attr["Error Code"])){
                $error_code = $attr["Error Code"];
            }else{
                $error_code = $attr["Activation Count"];
            }

            // $this->model->insert_data($attr['Key'], $error_code, $attr['Time']);

            curl_close($curl);
            echo json_encode($attr);
            echo "\n\n";
        }
    }
}

