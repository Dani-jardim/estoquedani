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
				<h1>Orçamento</h1>
			</div>

			<!--Conteudo aqui-->

			<div class="container-fluid">
				<hr>
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-content nopadding">
								<form id="form-wizard" class="form-horizontal" method="post" novalidate="novalidate">
									<div class="control-group">
										<label class="control-label">Nome:</label>
										<div class="controls">
											<input type="text" name="txtnome" class="span11">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Quantidade:</label>
										<div class="controls">
											<input type="number" name="txtqtd" class="span11">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Descrição:</label>
										<div class="controls">
											<textarea class="span11" rows="5"></textarea>
										</div>
									</div>
										<br>
										<center>
											<input id="back" class="btn btn-primary" type="reset" value="Adicionar" disabled="disabled">
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
											<th>Nome</th>
											<th width="50px">Valor</th>
											<th width="50px">Quantidade</th>
											<th width="150px">Opções</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>000001</td>
											<td>Caneta</td>
											<td>R$ 2,00</td>
											<td>50</td>
											<td>
											<center>
												<a href="#">Editar</a> | <a href="#">Remover</a>
											</center></td>
										</tr>
									</tbody>
								</table>
								<div class="pull-right">
									<h4><span>Total da venda:</span> R$ 220,00</h4>
									<br>
								</div>
								<br>
								<br>
								<br>
								<center>
									<button class="btn btn-success">
										Efetuar venda
									</button>
								</center>
								<br>
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
