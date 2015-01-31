<?=link_tag('css/styles.css')?>


<page orientation="paysage" >
 <bookmark title="Document" level="0" ></bookmark>
	<table cellspacing="0" style="width: 100%;">
        <tr>
			<th colspan="19" style="width: 100%; font-size: 8pt; text-align: right;">Formato AUTO.001 Rev.4 </th>
		</tr>
		<tr>
            <th colspan="3" style="width: 15%;">
                <?php 
                echo '<img style="width: 100%" src="'.base_url().'/images/logo.jpg" alt="Logo CHC" >';
                ?>
            </th>
            <th> Hoja nº: </th>
            <th></th>
            <th colspan="5">Fecha Producción:</th>
        </tr>
        <tr>
            <th colspan="14" style="width: 50%; text-align: left; font-weight: bold; font-size: 15pt; padding-left: 30pt;">
                Autocontrol Producción Vidrio: AUTOMOCION R43
				
            </th>
        </tr>
  
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
{/bl_pedidos}
</table>


</page>
