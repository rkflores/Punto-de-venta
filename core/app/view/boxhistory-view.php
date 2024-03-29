<section class="content">
<div class="row">
	<div class="col-md-12">
<!-- Single button -->
<div style="display:none;" class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/boxhistory-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
		<h1><i class='fa fa-archive'></i> Historial de Caja</h1>
		<div class="clearfix"></div>


<?php
$boxes = BoxData::getAll();
$products = SellData::getSellsUnBoxed();
if(count($boxes)>0){
$total_total = 0;
?>
<br>
<div class="box box-primary">
<table class="table table-bordered table-hover	">
	<thead>
		<th></th>
		<th>Total</th>
		<th>Almacen</th>
		<th>Fecha</th>
		<th>Ticket</th>
	</thead>
	<?php foreach($boxes as $box):
$sells = SellData::getByBoxId($box->id);

	?>

	<tr>
		<td style="width:30px;">
<a href="./index.php?view=b&id=<?php echo $box->id; ?>" class="btn btn-default btn-xs"><i class="fa fa-arrow-right"></i></a>			
		</td>
		<td>

<?php
$total=0;
foreach($sells as $sell){
$operations = OperationData::getAllProductsBySellId($sell->id);
		$total += $sell->total-$sell->discount;
}
		$total_total += $total;
		echo "<b>".Core::$symbol." ".number_format($total,2,".",",")."</b>";

?>			

		</td>
		<td><?php echo $box->getStock()->name; ?></td>
		<td><?php echo $box->created_at; ?></td>
		<td><a  target="_blank" href="ticketcaja.php?id=<?php echo $box->id; ?>" class="btn btn-xs btn-default"><i class='fa fa-print'></i> Imprimir</a></td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<h1>Total: <?php echo Core::$symbol." ".number_format($total_total,2,".",","); ?></h1>
	<?php
}else {

?>
	<div class="jumbotron">
		<h2>No hay ventas</h2>
		<p>No se ha realizado ninguna venta.</p>
	</div>

<?php } ?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>
</section>