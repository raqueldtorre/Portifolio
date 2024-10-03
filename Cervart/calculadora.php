<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cervart - Cerveja Artesanal</title>
	<link rel="shortcut icon" href="icons/beer.png" >

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/estilos.css">


	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
	<div id="interface" class="container">
		<section id="home" class="container text-center">
			<h3 class="text-center titulo2">Calcule</h3>
				<form method="POST"	id="brix" action="calculadora.php#brix" class="d-block m-auto">
					<div class="row">						
						<div class="form-group col-md-6 offset-md-3">
							    <label for="b" class="font-weight-bold">Brix para Densidade Específica</label>
							    <p>Entre com o valor da Refratividade Medida em Brix (B)</p>
							    <input type="text" class="form-control "  id="b" name="b" required><br>
							    <button type="submit" name="calcular" class="btn btn-outline-success">Calcular</button>
						</div>
					</div>
				</form>
				<?php 
				if (isset($_POST['calcular'])) {
					$b = str_replace(",", ".",$_POST['b']); 

					$sg = 1.000898 + (0.003859118 * $b) + (0.00001370735 * $b * $b) + (0.00000003742517 * $b * $b * $b);

					echo "<h4>Resultado: $sg</h4>";
				}
					
				?>
				<h4>----------------------------------------------------------------------------</h4>
				<form method="POST"	id="densidade" action="calculadora.php#densidade"  class="d-block m-auto">	
					<div class="row">
				  		<div class="form-group col-md-6 offset-md-3">
							    <label for="fg" class="font-weight-bold">Densidade Especifica Final a partir do Brix Original e Final</label>
							    <p>Entre com o valor do Brix Original (OB) e o valor do Brix Final (FB)</p>
							    OB: <input type="text" class="form-control "  name="ob" id="ob" required>
							    FB: <input type="text" class="form-control "  name="fb" id="fb" required><br>
							    <button type="submit" name="calcular1" class="btn btn-outline-success">Calcular</button>
						</div> 
					</div>
				</form>
				<?php 
				if (isset($_POST['calcular1'])) {
					$ob = str_replace(",", ".", $_POST['ob']);
					$fb = str_replace(",", ".",$_POST['fb']);


					$fg = 1.001843 - 0.002318474 * $ob - 0.000007775 * $ob * $ob - 0.000000034 * $ob * $ob * $ob + 0.00574 * $fb + 0.00003344 * $fb * $fb + 0.000000086 * $fb * $fb * $fb;

					echo "<h4>Resultado: $fg</h4>";
				}
				?>
				<h4>----------------------------------------------------------------------------</h4>
				<form method="POST"	id="teor" action="calculadora.php#teor" class="d-block m-auto">
					<div class="row">						
						<div class="form-group col-md-6 offset-md-3">
							    <label for="b" class="font-weight-bold">Teor Alcoolico</label>
							    <p>Entre com o valor do Extrato Original (EO) e o valor do Extrato  Final  Aparente (EFA)</p>
								EO: <input type="text" class="form-control "  name="eo" id="eo" required>
							    EFA: <input type="text" class="form-control "  name="efa" id="efa" required><br>
							    <button type="submit" name="calcular2" class="btn btn-outline-success">Calcular</button>
						</div>
					</div>
				</form>
				<?php 
				if (isset($_POST['calcular2'])) {
					$eo =  str_replace(",", ".", $_POST['eo']);
					$efa = str_replace(",", ".", $_POST['efa']); 
	
					$abv = ($eo - $efa) * 131;

					echo "<h4>Resultado: $abv</h4>";
				}
				?>	
				<h4>----------------------------------------------------------------------------</h4>
				<form method="POST"	id="brassagem" action="calculadora.php#brassagem" class="d-block m-auto">
					<div class="row">						
						<div class="form-group col-md-6 offset-md-3">
							    <label for="b" class="font-weight-bold">Rendimento de Brassagem</label>
							    <p>Entre com o valor da Quantidade de Mostro Frio (QMF), Densidade (D), Extrato Original (EO) e o Peso Total (KG) </p>
								QMF: <input type="text" class="form-control "  name="qmf" id="qmf" required>
							    D: <input type="text" class="form-control "  name="d" id="d" required><br>
							    EO: <input type="text" class="form-control "  name="eo1" id="eo1" required><br>
							    KG: <input type="text" class="form-control "  name="kg" id="kg" required><br>
							    <button type="submit" name="calcular3" class="btn btn-outline-success">Calcular</button>
						</div>
					</div>
				</form>
				<?php 
				if (isset($_POST['calcular3'])) {
					$qmf = str_replace(",", ".",$_POST['qmf']);
					$eo1 = str_replace(",", ".",$_POST['eo1']);
					$d = str_replace(",", ".",$_POST['d']);
					$kg = str_replace(",", ".",$_POST['kg']);

					$rb = ($qmf * $d * $eo1) / $kg;

					echo "<h4>Resultado: $rb</h4>";
				}
				?>
				<h4>----------------------------------------------------------------------------</h4>
				<form method="POST"	id="cor" action="calculadora.php#cor" class="d-block m-auto">
					<div class="row">						
						<div class="form-group col-md-6 offset-md-3">
							    <label for="b" class="font-weight-bold">Cor da Cerveja</label>
							    <p>Entre com o valor do Peso de Cada Malte (KGM), EBC de cada Malte (EBC) e o Peso Total (KG) </p>
								EBC1: <input type="text" class="form-control "  name="ebc1" id="ebc1" >
								EBC2: <input type="text" class="form-control "  name="ebc2" id="ebc2" >
								EBC3: <input type="text" class="form-control "  name="ebc3" id="ebc3" >
								EBC4: <input type="text" class="form-control "  name="ebc4" id="ebc4" >
								EBC5: <input type="text" class="form-control "  name="ebc5" id="ebc5" >
							    KGM1: <input type="text" class="form-control "  name="kgm1" id="kgm1" >
							    KGM2: <input type="text" class="form-control "  name="kgm2" id="kgm2" >
							    KGM3: <input type="text" class="form-control "  name="kgm3" id="kgm3" >
							    KGM4: <input type="text" class="form-control "  name="kgm4" id="kgm4" >
							    KGM5: <input type="text" class="form-control "  name="kgm5" id="kgm5" ><br>
							    <button type="submit" name="calcular4" class="btn btn-outline-success">Calcular</button>
						</div>
					</div>
				</form>
				<?php 
				if (isset($_POST['calcular4'])) {
					$ebc1 = $_POST['ebc1'];
					$ebc2 = $_POST['ebc2'];
					$ebc3 = $_POST['ebc3'];
					$ebc4 = $_POST['ebc4'];
					$ebc5 = $_POST['ebc5'];
					$kgm1 = $_POST['kgm1'];
					$kgm2 = $_POST['kgm2'];
					$kgm3 = $_POST['kgm3'];
					$kgm4 = $_POST['kgm4'];
					$kgm5 = $_POST['kgm5'];
					$kg1 = $kgm1 + $kgm2 + $kgm3 + $kgm4 + $kgm5;

					$cor = (($ebc1 + $ebc2 + $ebc3 + $ebc4 + $ebc5) * ($kgm1 + $kgm2 + $kgm3 + $kgm4 + $kgm5)) / $kg1;
				
				if ($cor >= 4 && $cor < 8) {
					echo "<h4>Dourada Clara</h4>";
					echo "<h4>Resultado: $cor</h4>";
				}elseif ($cor >= 8 && $cor < 12) {
					echo "<h4>Dourada - Alaranjada</h4>";
					echo "<h4>Resultado: $cor</h4>";					
				}elseif ($cor >= 12 && $cor < 20) {
					echo "<h4>Âmbar</h4>";
					echo "<h4>Resultado: $cor</h4>";	
				}elseif ($cor >= 20 && $cor < 35) {
					echo "<h4>Acobreada - Avermelhada</h4>";
					echo "<h4>Resultado: $cor</h4>";
				}elseif ($cor >= 35 && $cor < 60) {
					echo "<h4>Marrom</h4>";
					echo "<h4>Resultado: $cor</h4>";
				}
				elseif ($cor > 60) {
					echo "<h4>Preta</h4>";
					echo "<h4>Resultado: $cor</h4>";
				}
				}
				
				?>		
		</section>
</div>