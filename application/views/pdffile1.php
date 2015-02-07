<?=link_tag('css/styles.css')?>

{bl_pag}

<page orientation="paysage" >
 <bookmark title="Document" level="0" ></bookmark>
	<table cellspacing="0" style="width: 100%;">
        <tr>
			<th colspan="19" style="width: 100%; font-size: 8pt; text-align: right; border: none;">Formato AUTO.001 Rev.4 </th>
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
		<TD>{PEDIDO} </TD>
		<TD>{UNIDADES} </TD>
		<TD>{COLOR} </TD>
		<TD>{FORMA} </TD>
		<TD>{LONGITUD} </TD>
		<TD>{ANCHURA} </TD>
		<TD>{ESCUADRIA} </TD>
		<TD>{ESPESOR} </TD>
		<TD>{FLECHA LOCAL} </TD>
		<TD>{FLECHA TOTAL} </TD>
		<TD>{PUNTO ANALIZADO} </TD>
		<TD>{FRAGMENTACION PARTICULAS}</TD>
		<TD>{FRAGMENTACION ALARGADA}</TD>
		<TD>{FRAGMENTACION P.GRUESAS}</TD>
		<TD>{CANTOS}</TD>
		<TD>{MARCADO AUTOMOCION}</TD>
		<TD>{FECHA HORNO}</TD>
		<TD>{FECHA CALIDAD}</TD>
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
