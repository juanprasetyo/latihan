<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pdf {
    function Mpdf(){
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    } 
    function load($param = NULL){
        include_once APPPATH.'third_party\mpdf\vendor\autoload.php';
        if ($param == NULL)
        {
            $param = '"","Legal","","",10,10,10,10,6,3';
        }
        return new mPDF($param);
    }
}