<?=link_tag('css/styles.css')?>


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
		<TD>{0} </TD>
		<TD>{1} </TD>
		<TD>{2} </TD>
		<TD>{3} </TD>
		<TD>{4} </TD>
		<TD>{5} </TD>
		<TD>{6} </TD>
		<TD>{7} </TD>
		<TD>{8} </TD>
		<TD>{9} </TD>
		<TD>{10}</TD>
		<TD>{11}</TD>
		<TD>{12}</TD>
		<TD>{13}</TD>
		<TD>{14}</TD>
		<TD>{15}</TD>
		<TD>{16}</TD>
		<TD>{17}</TD>
	</TR>
	</form>
{/bl_pedidos}
</table>


</page>
