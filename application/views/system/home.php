<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
	<div class="container">
		<a class="navbar-brand" href="/">
			<img src=<?= base_url('public/img/plano_cartao_320x320.png') ?> alt="IMG Plano">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
			<div class="navbar-collapse-header">
				<div class="row">
					<div class="col-6 collapse-brand">
						<a href="dashboard.html">
							<img src=<?= base_url('public/img/plano_cartao_320x320.png') ?>>
						</a>
					</div>
					<div class="col-6 collapse-close">
						<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">

					<ahref="" class="nav-link" style="font-size: 24pt; font-weight: bold;">
						<span class="nav-link-inner--text"><span style="font-size: 30pt;">T</span>elzir</span>
					</a>
				</li>
			</ul>
			<hr class="d-lg-none" />
			<ul class="navbar-nav align-items-lg-center ml-lg-auto">
				<li class="nav-item d-none d-lg-block ml-lg-4">
					<a href="#" class="btn btn-neutral btn-icon">
						<span class="btn-inner--icon">
							<i class="fas fa-shopping-cart mr-2"></i>
						</span>
						<span class="nav-link-inner--text">Contratar FaleMais</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!-- Page content -->
<div class="container mt--9 pb-5">
	<div class="row">
		<?php
		// Extrai os dados da tabela minutos 
		foreach ($minutos as $minuto) {
			extract($minuto);
		?>
			<div class="col-xl-4 col-md-6">
				<div class="card card-stats">
					<!-- Card body -->
					<div class="card-body">
						<div class="row">
							<div class="col">
								<h5 class="card-title text-uppercase text-muted mb-0">Fale Mais</h5>
								<span class="h2 font-weight-bold mb-0"><?= $min_minuto ?> Minutos</span>
							</div>
							<div class="col-auto">
								<div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
									<i class="ni ni-app"></i>
								</div>
							</div>
						</div>
						<p class="mt-3 mb-0 text-sm">

							<span class="text-nowrap">Fale de graça até o limite do seu plano.</span>
						</p>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</div>
	<!-- Table -->
	<div class="row justify-content-center" >
		<div class="col-lg-9 col-md-8">
			<div class="card bg-secondary border-0">
				<div class="card-body px-lg-5 py-lg-5">
					<div class="text-center text-muted mb-4">
						Insira os dados para calcular o valor final da sua ligação.
					</div>
					<form class="row api-form" data-api-jsonp="sendForm" data-btn="#btn-send" data-btn-text="Enviar" data-btn-logo="Processando..." role="form" method="POST" action="/CalculaValor">
						<!-- DDD Origem e Destino-->
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="origem_destino">DDDs de origem e destino:</label>
								<select required name="origem_destino" id="origem_destino" class="form-control">
									<option value="">Selecione</option>
									<?php
									foreach ($codigo_tarifa as $codigo) {
										extract($codigo);
										echo '<option value="' . $id . '">DDD origem ' .  $origem . ' para DDD destino ' . $destino . ' </option>';
									}
									?>
								</select>
							</div>
						</div>
						<!-- Plano Minutos  -->
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="plano">Plano <b>Fale Mais</b>:</label>
								<select required name="plano" id="plano" class="form-control">
								<option value="">Selecione</option>
									<?php
									foreach ($minutos as $minuto) {
										extract($minuto);
										echo '<option value="' . $min_minuto . '">' .  $min_minuto . ' Minutos</option>';
									}
									?>
								</select>
							</div>
						</div>
						<!-- Minutos  -->
						<div class="col-lg-6">
							<div class="form-group">
								<label class="form-control-label" for="minuto">Tempo de ligação em minutos:</label>
								<input required type="number" name="minuto" id="minuto" class="form-control">

							</div>
						</div>
						<!-- Minutos  -->
						<div class="col-lg-12">
							<div class="form-group">
								<button id="btn-send" class="btn btn-block btn-lg bg-gradient-blue"> <span style="color: #fff; font-size: 14pt;">Consultar</span> </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row mt-3 col-lg-12 col-md-12" id="resultado" style="display: none;">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header border-0">
						<div class="row align-items-center">
							<div class="col">
								<h2 class="mb-0" style="text-align: center;">Resultado </h2>
								<h3 class="mb-0">Plano: <strong id="plano_txt"></strong></h3>
							</div>
						</div>
					</div>
					<div class="row">
					<div class="col-xl-1 col-md-6"></div>
						<div class="col-xl-2 col-md-6">
							<div class="card card-stats ">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">DDD Origem</h5>
											<span id="origem" class="h2 font-weight-bold mb-0"></span>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-md-6">
							<div class="card card-stats ">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">
												DDD Destino</h5>
											<span id="destino" class="h2 font-weight-bold mb-0"></span>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-md-6">
							<div class="card card-stats ">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Tempo</h5>
											<span id="tempo" class="h2 font-weight-bold mb-0"></span>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-md-6">
							<div class="card card-stats ">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Com FaleMais</h5>
											<span id="cFaleMais" class="h2 font-weight-bold mb-0"></span>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-xl-2 col-md-6">
							<div class="card card-stats ">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Sem FaleMais</h5>
											<span id="sFaleMais" class="h2 font-weight-bold mb-0"></span>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>