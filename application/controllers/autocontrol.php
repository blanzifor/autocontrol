<?php 
class autocontrol extends CI_Controller {
    function __construct() {
       parent::__construct();
    }

    function index($offset=0) { 
        

        $file = $this->readerFile();

        $file = $this->duplicateItem($file);

                


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
        
        array_pop($file);

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
                $comb['size'] = $this->randomFontSize();
            }
                $combinado[] = $comb;   
        }
            

        // Cambio los OK por un checkbox   
        /*foreach ($combinado as $key => $value) {
            foreach ($value as $clave => $valor) {
               // if ($valor == 'OK') {
               //     $valor = '<input type="checkbox" checked="checked" />';
               // }
                $linesokt[$clave] = $valor;
            }
            $linesok[$key] = $linesokt;
        }*/
      

        // Hacer los cortes segun se repitan las lineas iguales.
        $fecha0 = $combinado[0]['FECHA HORNO'];
        $contador = 0;
        $suma = 0;
        foreach ($combinado as $key => $value) {
            $fecha = $value['FECHA HORNO'];

            if($fecha == $fecha0){
                $contador = $contador +1; 
                $suma = $suma +1;
            }else{
            
                if(!isset($contp)){
                    $contp[$key]['lenght'] = $contador;
                    $contp[$key]['offset'] = 0;
                }else{
                    $contp[$key]['lenght'] = $contador;
                    $contp[$key]['offset'] = $suma - $contador -1;
                }


                $suma = $suma +1;

                $contador = 0;
                $fecha0= $value['FECHA HORNO'];
            
            }   
        }
        foreach ($contp as $key => $value) {
                $linesok[] = array_slice($combinado, $value['offset'], $value['lenght']);
            }


                
        //Paginacion cada 21 lineas      
        //$pageLines = 21;
        //$linesok = array_chunk($combinado, $pageLines);
                
        // Relleno con lineas en blanco hasta completar las 21 lineas       
        
        foreach ($linesok as $key => $value) {
            while(count($value)< 21){
                $value[] = array('PEDIDO' => '', 
                                'UNIDADES' => '',
                                'COLOR' => '',
                                'FORMA' => '',
                                'LONGITUD' => '',
                                'ANCHURA' => '',
                                'ESCUADRIA' => '',
                                'ESPESOR' => '',
                                'FLECHA LOCAL' => '',
                                'FLECHA TOTAL' => '',
                                'PUNTO ANALIZADO' => '',
                                'FRAGMENTACION PARTICULAS' => '',
                                'FRAGMENTACION ALARGADA' => '',
                                'FRAGMENTACION P.GRUESAS' => '',
                                'CANTOS' => '',
                                'MARCADO AUTOMOCION' => '',
                                'FECHA HORNO' => '',
                                'FECHA CALIDAD' => '.',
                                'fuente' => 'jj');
                
            }   
                
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

    function randomFontSize(){
        $random = rand(14, 20);
        
        if ($random % 2 != 0){
            $random = $random + 1 ;
        }
        
        return $random;
    }

    
    /* Buscando de forma aleatoria el hacer tachones. 
    /* Busco un numero aleatorio divisible entre 7
    /*
    /*
    */
    function randomScratch(){
        $random = rand(1,10);
        if($random % 7 == 0){
            $r = true;
        }else{
            $r = false;
        }
        return $r;
    }


    function duplicateItem($file){
        foreach ($file as $key => $value) {
            if ($key != 0 && $this->randomScratch() == true){
                /* Si el aleatorio es true. Tengo que recortar la cadena value $value
                   Tengo un array con la linea que tengo que Tachar */
                $newValue = explode('#', $value);
                $newValue[2] = $this->changeColor($newValue[2]);
                $newValue[6] = '';
                $newValue[7] = '';
                $newValue[8] = '';
                $newValue[9] = '';
                $newValue[10] = '';
                $newValue[11] = '';
                $newValue[12] = '';
                $newValue[13] = '';
                $newValue[14] = '';
                $newValue[15] = '';
                $newValue[16] = '';
                $newValue[17] = '';

                $newValue = implode('#', $newValue);                        

                $newfile[] = $newValue;
                $newfile[] = $value;
            }else
                $newfile[] = $value;
        }
        return $newfile;
    }

    function changeColor($color0){

        do {
        $randomColor = rand(1,5);
            switch ($randomColor) {
                case '1':
                    $colorf = 'INCOLORO';
                    break;
                case '2':
                    $colorf = 'VERDE';
                    break;
                case '3':
                    $colorf = 'VERDE VENUS';
                    break;
                case '4':
                    $colorf = 'GRIS';
                    break;
                case '5':
                    $colorf = 'BRONCE';
                    break;
            }   
                       
        } while ($color0 == $colorf);
        return $colorf;

    }


}
