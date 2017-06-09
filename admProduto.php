<?php
require_once 'modulo/conexao.php';
if (isset($_GET['btnadicionar'])) {

	$sql="INSERT INTO `dreamteam`.`tbproduto`
	(`nome`,
	`descricao`,
	`valor`,
	`qtd`,
	`tbcategoria_codigo`,
	`tblogin_codigo`)
	VALUES
	('".$_GET['txtnome']."',
	'".$_GET['txtdescricao']."',
	'".$_GET['txtvalor']."',
	'".$_GET['txtqtd']."',
	".$_GET['txtcategoria'].",
	1);
	";
	$conn->exec($sql);
	header('Location: admProduto.php');

} elseif (isset($_GET['btnatualizar'])) {

	$sql="UPDATE `dreamteam`.`tbproduto`
	SET
	`nome` = '".$_GET['txtnome']."',
	`descricao` = '".$_GET['txtdescricao']."',
	`valor` = '".$_GET['txtvalor']."',
	`qtd` = '".$_GET['txtqtd']."',
	`tbcategoria_codigo` = ".$_GET['txtcategoria']."
	WHERE `codigo` = ".$_GET['txtcodigo'].";
	";
	
	$conn->exec($sql);
	header('Location: admProduto.php');

} elseif (isset($_GET['editar'])) {

	$sql = "SELECT tbproduto.*, tbcategoria.nome as categoria FROM dreamteam.tbproduto
join tbcategoria on tbcategoria.codigo = tbproduto.tbcategoria_codigo WHERE tbproduto.codigo='".$_GET['editar']."'";

	foreach ($conn->query($sql) as $rs) {
        $botao_valor="Atualizar";
		$botao_nome="btnatualizar";
		$codigo=$rs['codigo'];
		$nome=$rs['nome'];
		$qtd=$rs['qtd'];
		$valor=$rs['valor'];
		$categoria=$rs['categoria'];
		$descricao=$rs['descricao'];
    }

} elseif (isset($_GET['excluir'])) {

	//$sql="DELETE FROM `bdteste`.`tblteste` WHERE `codigo`='".$_GET['excluir']."';";
	//$conn->exec($sql);
	header('Location: admProduto.php');

} else {

	$botao_valor="Adicionar";
	$botao_nome="btnadicionar";
	$codigo="";
	$nome="";
	$qtd="";
	$valor="";
	$categoria="";
	$descricao="";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<?php
	require_once 'modulo/cabecalho.php';
	?>
	<body>

		<!--Header-part-->
		<div id="header">
			<h1><a href="dashboard.html">Matrix Admin</a></h1>
		</div>
		<!--close-Header-part-->

		<!--top-Header-menu-->
		<div id="user-nav" class="navbar navbar-inverse">
			<?php
			require_once 'modulo/head.php';
			?>
		</div>
		<!--close-top-Header-menu-->
		<!--start-top-serch-->
		<!--close-top-serch-->
		<!--sidebar-menu-->
		<div id="sidebar">
			<a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
			<?php
			require_once 'modulo/menu.php';
			?>
		</div>
		<!--sidebar-menu-->

		<!--main-container-part-->
		<div id="content">
			<!--breadcrumbs-->
			<div id="content-header">
				<div id="breadcrumb">
					
				</div>
				<h1>Gerenciador de Produtos</h1>
			</div>

			<!--Conteudo aqui-->

			<div class="container-fluid">
				<hr>
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-content nopadding">
								<form id="form-wizard" class="form-horizontal" method="GET" novalidate="novalidate">
									<input type="hidden" name="txtcodigo" value="<?php echo($codigo); ?>">
									<div class="control-group">
										<label class="control-label">Nome:</label>
										<div class="controls">
											<input type="text" name="txtnome" class="span11" value="<?php echo($nome); ?>">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Valor:</label>
										<div class="controls">
											<input id="password" type="text" name="txtvalor" class="span11" value="<?php echo($valor); ?>">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Quantidade:</label>
										<div class="controls">
											<input type="number" name="txtqtd" class="span11" value="<?php echo($qtd); ?>">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Categoria:</label>
										<div class="controls">
											<select class="span11" name="txtcategoria">
												<option value=""></option>
												<?php
												$sql = "SELECT * FROM tbcategoria;";
												foreach ($conn->query($sql) as $rs) {
													if ($rs['nome'] <> $categoria) {
														echo("<option value=" . $rs['codigo'] . ">" . $rs['nome'] . "</option>");
													} else {
														echo("<option value=" . $rs['codigo'] . " selected>" . $rs['nome'] . "</option>");
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tributos:</label>
										<div class="controls">
											<div class="checkbox">
												<label><input type="checkbox" value="">Tributo A</label>
											</div>
											<div class="checkbox">
												<label><input type="checkbox" value="">Tributo B</label>
											</div>
											<div class="checkbox disabled">
												<label><input type="checkbox" value="">Tributo C</label>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Descrição:</label>
										<div class="controls">
											<textarea class="span11" rows="5" name="txtdescricao"><?php echo($descricao); ?></textarea>
										</div>
									</div>
									<br>
									<center>
											<input class="btn btn-primary" type="submit" value="<?php echo($botao_valor); ?>" name="<?php echo($botao_nome); ?>">
									</center>
									<br>
								</form>
							</div>
							<h3 align="center">Lista de produtos</h3>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="75px">Codigo</th>
											<th width="400px">Nome</th>
											<th width="50px">Valor</th>
											<th width="50px">Quantidade</th>
											<th>Categoria</th>
											<th width="150px">Opções</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT tbproduto.*, tbcategoria.nome as categoria FROM dreamteam.tbproduto
join tbcategoria on tbcategoria.codigo = tbproduto.tbcategoria_codigo";
	
										foreach ($conn->query($sql) as $rs) {
										?>
										<tr>
											<td><?php echo($rs['codigo']); ?></td>
											<td><?php echo($rs['nome']); ?></td>
											<td><?php echo($rs['valor']); ?></td>
											<td><?php echo($rs['qtd']); ?></td>
											<td><?php echo($rs['categoria']); ?></td>
											<td>
											<center>
												<a href="admProduto.php?editar=<?php echo($rs['codigo']); ?>">Editar</a> | <a href="admProduto.php?excluir=<?php echo($rs['codigo']); ?>">Excluir</a>
											</center></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!--end-main-container-part-->

		<!--Footer-part-->
		<?php
		require_once 'modulo/footer.php';
		?>

		<!--end-Footer-part-->

		<script src="js/excanvas.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.ui.custom.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.flot.min.js"></script>
		<script src="js/jquery.flot.resize.min.js"></script>
		<script src="js/jquery.peity.min.js"></script>
		<script src="js/fullcalendar.min.js"></script>
		<script src="js/matrix.js"></script>
		<script src="js/matrix.dashboard.js"></script>
		<script src="js/jquery.gritter.min.js"></script>
		<script src="js/matrix.interface.js"></script>
		<script src="js/matrix.chat.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script src="js/matrix.form_validation.js"></script>
		<script src="js/jquery.wizard.js"></script>
		<script src="js/jquery.uniform.js"></script>
		<script src="js/select2.min.js"></script>
		<script src="js/matrix.popover.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/matrix.tables.js"></script>

		<script type="text/javascript">
			// This function is called from the pop-up menus to transfer to
			// a different page. Ignore if the value returned is a null string:
			function goPage(newURL) {

				// if url is empty, skip the menu dividers and reset the menu selection to default
				if (newURL != "") {

					// if url is "-", it is this page -- reset the menu:
					if (newURL == "-") {
						resetMenu();
					}
					// else, send page to designated URL
					else {
						document.location.href = newURL;
					}
				}
			}

			// resets the menu selection upon entry to this page:
			function resetMenu() {
				document.gomenu.selector.selectedIndex = 2;
			}
		</script>
	</body>
</html>
