<?php
$letra = [
	0 => "A",
	1 => "B",
	2 => "C",
	3 => "D",
	4 => "E",
	5 => "F",
	6 => "G",
	7 => "H",
	8 => "I",
	9 => "J",
	10 => "K",
	11 => "L",
	12 => "M",
	13 => "N",
	14 => "O",
	15 => "P",
	16 => "Q",
	17 => "R",
	18 => "S",
	19 => "T",
	20 => "U",
	21 => "V",
	22 => "W",
	23 => "X",
	24 => "Y",
	25 => "Z"
];
$config = include 'config.php';
include "conexiones.php";
include "./templates/header.php";
echo "
	<div class=row>
	<div class=col-md-12>
			<h1 class=mt-3 align=center>
				Mangas
			</h1>
			<br>
	";
for ($nletra = 0; $nletra <= 25; $nletra++) {
	$consultaSQL = "SELECT * FROM mangas ";
	$consultaSQL .= "INNER JOIN inicio ";
	$consultaSQL .= "ON mangas_id = inicio.manga_id ";
	$consultaSQL .= "WHERE letra_inicio LIKE '" . $letra[$nletra] . "'";
	$consultaSQL .= "ORDER BY nombre_manga ASC ";
	$sentencia = $conexion->prepare($consultaSQL);
	$sentencia->execute();
	$inicio = $sentencia->fetchAll();
	echo "
		<h2 align=center>" . $letra[$nletra] . "</h2>
			<div class=row>
				<div class=col-md-12>
			";
	if (isset($inicio) && $sentencia->rowCount() > 0) {
		foreach ($inicio as $fila) {
			echo "
			<ul>
				<li>
					<a href=mangas.php?manga_id=" . $fila["manga_id"] . ">
						<b>
							" . $fila["nombre_manga"] . ".
						</b>
					</a>
				</li>
			</ul>
		";
		}
	} else {
		echo "
			<ul>
				<li>
					No hay mangas aún con esa letra.
				</li>
			</ul>
		";
	}
	if ($nletra < 25) {
		echo "<hr color=#000000>";
	}
}
echo "
				</div>
			</div>
		</div>
	";
include "./templates/footer.php";
