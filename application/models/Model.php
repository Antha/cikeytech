<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Model extends CI_Model{

    function insert_data($key, $error_code, $datetime){
        $data = array(
            'KEY' => $key,
            'ERROR_CODE' => $error_code,
            'DATE_TIME' => $datetime
        );

        $this->db->insert('keylog', $data);
    }
}
