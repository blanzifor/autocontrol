<?php 
class autocontrol extends CI_Controller {
    function __construct() {
       parent::__construct();
    }

    function index($offset=0) { 
        

        $file = $this->readFile();
        $lines = $this->extractLines($file);
        echo '<pre>';
        print_r($lines);
        echo '</pre>';

        $textos =  array('bl_pedidos' => $lines, );


        $html=$this->parser->parse('pdffile',$textos);

        
        //call the function createPDF
        //$this->dompdf_lib->createPDF($html, 'myfilename');        
             
    }       

    function readFile(){
        $file = file($this->config->item('file_path'));
        return $file;
    }

    /*----------------------------------------------------------
    | return Array asociativo con las líneas del fichero

    */

    function extractLines($file) {
        
        // Separo el fichero en cabecera y líneas

        foreach ($file as $key => $value) {
            if($key == 0){        
                //$line[$key][] = explode(',', $value);
                $header[] = preg_split("/[\t,]+/", $value);
            }else{
                $lines[] = preg_split("/[\t,]+/", $value);
            }
        }
        
        // Convierto todo en un array asociativo donde las claves son la cabecera

        foreach ($lines as $value) {
            foreach ($value as $key => $value) {
                $comb[$header[0][$key]] = $value;
            }
                $combinado[] = $comb;   
        }
       
        
        return $combinado;

    }


}
