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
				<h1>Vendas</h1>
			</div>

			<!--Conteudo aqui-->

			<div class="container-fluid">
				<hr>
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-content">
								<div class="row-fluid">
									<div class="span12">
										<table class="table table-bordered table-invoice">
											<tbody>
												<tr></tr>
												<tr>
													<td class="width30">Código:</td>
													<td class="width70"><strong>21312</strong></td>
												</tr>
												<tr>
													<td>Data:</td>
													<td><strong>23 de Fevereiro de 2013</strong></td>
												</tr>
												<tr>
													<td>Hora:</td>
													<td><strong>17:55</strong></td>
												</tr>
												</tr>
											</tbody>

										</table>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<h3 align="center">Produtos</h3>
										<table class="table table-bordered table-invoice-full">
											<thead>
												<tr>
													<th class="head0">Nome</th>
													<th class="head1">Descrição</th>
													<th class="head0 right">Quantidade</th>
													<th class="head1 right">Preço</th>
													<th class="head0 right">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Caneta</td>
													<td>Ut santium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae</td>
													<td class="right">10</td>
													<td class="right">R$ 2,00</td>
													<td class="right"><strong>R$ 200,00</strong></td>
												</tr>
											</tbody>
										</table>
										<h3 align="center">Tributos</h3>
										<table class="table table-bordered table-invoice-full">
											<thead>
												<tr>
													<th class="head0">Nome</th>
													<th class="head1">Descrição</th>
													<th class="head0 right">Quantidade</th>
													<th class="head0 right">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Tributo A</td>
													<td>Adicionar ao valor final da compra, apenas uma vez.</td>
													<td class="right">10%</td>
													<td class="right"><strong>R$ 20,00</strong></td>
												</tr>
											</tbody>
										</table>
										<div class="pull-right">
											<h4><span>Total da venda:</span> R$ 220,00</h4>
											<br>
										</div>
									</div>
								</div>
								<h3 align="center">Lista de vendas</h3>
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
											<tr>
												<td>000001</td>
												<td>Caneta</td>
												<td>R$ 2,00</td>
												<td>50</td>
												<td>Escolar</td>
												<td>
												<center>
													<a href="#">Ver detalhes</a></a>
												</center></td>
											</tr>
										</tbody>
									</table>
								</div>
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
