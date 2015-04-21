<?=link_tag('css/styles.css')?>

{bl_pag}

<page orientation="paysage" >
 <bookmark title="Document" level="0" ></bookmark>
	<table cellspacing="0" style="width: 100%;">
        <tr>
			<th colspan="19" style="width: 100%; font-size: 8pt; text-align: right; border: none;">Formato AUTO.001 Rev.4 &nbsp;</th>
		</tr>
		<tr>
            <th colspan="4" style="width: 15%; border:none;">
                <?php 
                echo '<img style="width: 98%" src="'.base_url().'/images/logo.jpg" alt="Logo CHC" >';
                ?>
            </th>
            <th colspan="7" style="border:none;"> Hoja nº:________ </th>
            <th colspan="4" style="text-align:left; border:none;">Fecha Producción:____/_____/______</th>
            <th colspan="3" style="text-align:right; border:none;">Semana:_________ </th>
        </tr>
        <tr>
            <th colspan="11" style="width: 50%; text-align: left; font-weight: bold; font-size: 15pt; border:none">
                Autocontrol Producción Vidrio: AUTOMOCION R43
            </th>
            <th colspan="4" style="text-align:left; border:none;">Parametros Horno Correctos (si/no): ____</th>
        </tr>
        <tr></tr>
  
		<TR>

			<TH>Pedido</TH>
			<TH>Unid.</TH>
			<TH>Color</TH>
			<TH>Forma</TH>
			<TH>Long. <br />(mm)</TH>
			<TH>Anch. <br />(mm)</TH>
			<TH>Escuadria <br /> Diag. (mm)</TH>
			<TH>Espesor <br /> E (mm)</TH>
			<TH>Flecha <br /> Local</TH>
			<TH>Flecha <br /> Total</TH>
			<TH>Punto <br /> analizado</TH>
			<TH>Fragment. <br /> de particulas</TH>
			<TH>Fragment. <br /> alargada</TH>
			<TH>Fragment. <br /> P. gruesas</TH>
			<TH>Cantos</TH>
			<TH>Marcado <br /> automoción</TH>
			<TH>Fecha <br> horno</TH>
			<TH>Fecha <br /> calidad</TH>
		</TR>
	
{bl_pedidos}
	<form>
	<TR>
		<TD style="font-size:{size}; font-family:{fuente};">{PEDIDO} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{UNIDADES} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{COLOR} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{FORMA} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{LONGITUD} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{ANCHURA} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{ESCUADRIA} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{ESPESOR} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{FLECHA LOCAL} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{FLECHA TOTAL} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{PUNTO ANALIZADO} </TD>
		<TD style="font-size:{size}; font-family:{fuente};">{FRAGMENTACION PARTICULAS}</TD>
		<TD style="font-size:{size}; font-family:{fuente};">{FRAGMENTACION ALARGADA}</TD>
		<TD style="font-size:{size}; font-family:{fuente};">{FRAGMENTACION P.GRUESAS}</TD>
		<TD style="font-size:{size}; font-family:{fuente};">{CANTOS}</TD>
		<TD style="font-size:{size}; font-family:{fuente};">{MARCADO AUTOMOCION}</TD>
		<TD style="font-size:{size}; font-family:{fuente};">{FECHA HORNO}</TD>
		<TD style="font-size:{size}; font-family:{fuente};">{FECHA CALIDAD}</TD>
	</TR>
	</form>
{/bl_pedidos}
<tr>
<th colspan=12 style="text-align:left; vertical-align:top">Observaciones</th>
<th colspan=3 style="text-align:left;"> Firma: Responsable Horno <br /><br /><br />Fecha: </th>
<th colspan=3 style="text-align:left;"> Firma: Calidad <br /><br /><br />Fecha:</th>

</tr>

</table>


</page>
{/bl_pag}
