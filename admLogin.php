<?php
require_once 'modulo/conexao.php';
if (isset($_GET['btnadicionar'])) {

	$sql="INSERT INTO `dreamteam`.`tblogin`
	(`nome`,
	`sobrenome`,
	`email`,
	`senha`,
	`tblfuncao_codigo`)
	VALUES
	('".$_GET['txtnome']."',
	'".$_GET['txtsobrenome']."',
	'".$_GET['txtemail']."',
	'".$_GET['txtsenha']."',
	".$_GET['txtfuncao'].");
	";
	$conn->exec($sql);
	header('Location: admLogin.php');

} elseif (isset($_GET['btnatualizar'])) {

	$sql="UPDATE `dreamteam`.`tblogin`
	SET
	`nome` = '".$_GET['txtnome']."',
	`sobrenome` = '".$_GET['txtsobrenome']."',
	`email` = '".$_GET['txtemail']."',
	`senha` = '".$_GET['txtsenhanome']."',
	`tblfuncao_codigo` = ".$_GET['txtfuncao']."
	WHERE `codigo` = ".$_GET['txtcodigo'].";
	";

	$conn->exec($sql);
	header('Location: admLogin.php');

} elseif (isset($_GET['editar'])) {

	$sql = "SELECT tblogin.*, tblfuncao.nome as funcao FROM dreamteam.tblogin
join tblfuncao on tblfuncao.codigo = tblogin.tblfuncao_codigo WHERE tblogin.codigo =".$_GET['editar'];

	foreach ($conn->query($sql) as $rs) {
        $botao_valor="Atualizar";
		$botao_nome="btnatualizar";
		$codigo=$rs['codigo'];
		$nome=$rs['nome'];
		$sobrenome=$rs['sobrenome'];
		$email=$rs['email'];
		$funcao=$rs['funcao'];
		$senha=$rs['senha'];
    }

} elseif (isset($_GET['excluir'])) {

	if($_GET['excluir']<>1){
	$sql="DELETE FROM `tblogin` WHERE `codigo`='".$_GET['excluir']."';";
	$conn->exec($sql);
	}
	header('Location: admLogin.php');
	

} else {

	$botao_valor="Adicionar";
	$botao_nome="btnadicionar";
	$codigo="";
	$nome="";
	$sobrenome="";
	$email="";
	$funcao="";
	$senha="";
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
				<h1>Gerenciador de Login</h1>
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
										<label class="control-label">Sobrenome:</label>
										<div class="controls">
											<input id="text" type="text" name="txtsobrenome" class="span11" value="<?php echo($sobrenome); ?>">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">E-mail:</label>
										<div class="controls">
											<input type="email" name="txtemail" class="span11" value="<?php echo($email); ?>">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Função:</label>
										<div class="controls">
											<select class="span11" name="txtfuncao">
												<option value=""></option>
												<?php
												$sql = "SELECT * FROM tblfuncao;";
												foreach ($conn->query($sql) as $rs) {
													if ($rs['nome'] <> $funcao) {
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
										<label class="control-label">Senha:</label>
										<div class="controls">
											<input type="password" name="txtsenha" class="span11" value="<?php echo($senha); ?>">
										</div>
									</div>
									<br>
									<center>
											<input class="btn btn-primary" type="submit" value="<?php echo($botao_valor); ?>" name="<?php echo($botao_nome); ?>">
									</center>
									<br>
								</form>
							</div>
							<h3 align="center">Lista de login</h3>
							<div class="widget-content nopadding">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="75px">Codigo</th>
											<th width="200px">Nome</th>
											<th width="200px">Sobrenome</th>
											<th width="100px">E-mail</th>
											<th>Função</th>
											<th width="150px">Opções</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT tblogin.*, tblfuncao.nome as funcao FROM dreamteam.tblogin
join tblfuncao on tblfuncao.codigo = tblogin.tblfuncao_codigo";
	
										foreach ($conn->query($sql) as $rs) {
										?>
										<tr>
											<td><?php echo($rs['codigo']); ?></td>
											<td><?php echo($rs['nome']); ?></td>
											<td><?php echo($rs['sobrenome']); ?></td>
											<td><?php echo($rs['email']); ?></td>
											<td><?php echo($rs['funcao']); ?></td>
											<td>
											<center>
												<a href="admLogin.php?editar=<?php echo($rs['codigo']); ?>">Editar</a> | <a href="admLogin.php?excluir=<?php echo($rs['codigo']); ?>">Excluir</a>
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
