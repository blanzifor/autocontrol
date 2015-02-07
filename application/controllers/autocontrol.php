<?php 
class autocontrol extends CI_Controller {
    function __construct() {
       parent::__construct();
    }

    function index($offset=0) { 
        

        $file = $this->readerFile();
        $lines = $this->extractLines($file);
                
        $textos =  array(
                'bl_pag'     => $lines['bl_paginas'],
                //'bl_pedidos' => $lines[0]['bl_pedidos'], 
                //'FlechaLocal' => $lines[8],
                );

        $html=$this->parser->parse('pdffile1',$textos);

        
        //call the function createPDF
        //$this->dompdf_lib->createPDF($html, 'myfilename');        
             

        // get the HTML
        //ob_start();
        //include(dirname(__FILE__).'/file.php');
        //$content = ob_get_clean();

        // convert to PDF
        //require_once(dirname(__FILE__).'/../html2pdf.class.php');
         try
        {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
    //      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
            $html2pdf->writeHTML($html, isset($_GET['vuehtml']));
            $html2pdf->Output('AutoControl.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }



    /*----------------------------------------------------------
    | return Array asociativo con las líneas del fichero
    |
    */
    function readerFile(){
        $file = file($this->config->item('file_path'));
            
        return $file;
    }

    /*----------------------------------------------------------
    | return Array asociativo con las líneas del fichero
    |
    */

    function extractLines($file) {
        
        // Separo el fichero en cabecera y líneas
        foreach ($file as $key => $value) {
            if($key <> 0){        
                $lines[] = explode('#', $value);
                //$lines[] = preg_split("/[\t,]+/", $value);
            }else{
                 $header[] = explode('#', $value);
            }
        }
        
        // Convierto todo en un array asociativo donde las claves son la cabecera
        foreach ($lines as $value) {
            foreach ($value as $key => $value) {
                $comb[$header[0][$key]] = $value;
                $comb['fuente'] = $this->randomFont();
            }
                $combinado[] = $comb;   
        }

        // Cambio los OK por un checkbox   
        foreach ($combinado as $key => $value) {
            foreach ($value as $clave => $valor) {
                if ($valor == 'OK') {
                    $valor = '<input type="checkbox" checked="checked" />';
                }
                $linesokt[$clave] = $valor;
            }
            $linesok[$key] = $linesokt;
        }
        
        //Paginacion cada 25 lineas      
        $pageLines = 21;
        $linesok = array_chunk($linesok, $pageLines);

        foreach ($linesok as $key => $value) {
            $linesok1[] = array('bl_pedidos' => $value);
        }

        $linesok = array('bl_paginas' => $linesok1);
        return $linesok;

    }
    function extractHeader($file) {
        
        // Separo el fichero en cabecera y líneas
        foreach ($file as $key => $value) {
            if($key == 0){        
                //$value = ucfirst(strtolower($value));
                $header[] = explode('#', $value);
                
            }
        }
                
        return $header;

    }

    function randomFont(){
         $random = rand(0,3);

        switch ($random) {
            case '0':
                $font = 'coliso';
                break;
            case '1':
                $font = 'lucasfont';
                break;
            case '2':
                $font = 'coliso3';
                break;
            case '3':
                $font = 'jj';
                break;
        }

        return $font;
    }
}
