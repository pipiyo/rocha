<?php namespace Conexion;
require_once('../Conexion/Conexionpoo.php'); 
	/**
	* 
	Query ingreso metalico 
	*/
	class Query_ingreso_metalico extends Conexionpoo
	{
		private $codigo_productos_final = array();
		private $query;

		public function Query_simple($sql)
		{
			$a = array();
			$respuesta = $this->con->query($sql);

			while($fila = $respuesta->fetch_assoc()){
				$a[] = $fila; 
			}
			
			$respuesta->free();
			return $a;
		}


		public function MostrarLista()
		{
			 return $this->codigo_productos_final;
		}


	/**
	* 
	Ingreso lista codigos 
	*/
		public function Ingreso_productos($productos, $generico)
		{

			$this->query = $this->con->prepare("INSERT INTO `producto` (CODIGO_PRODUCTO, DESCRIPCION, CATEGORIA, CODIGO_GENERICO, TEMPORADA, FAMILIA, CUERPO, FRENTE, CANTO, TRASCARA, ESPESOR, RUTA, RUTA1, RUTA2, CAD_2D, CAD_3D, FORMATO) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

			$this->query->bind_param('sssssssssssssssss', $CODIGO_PRODUCTO, $DESCRIPCION, $CATEGORIA, $CODIGO_GENERICO, $TEMPORADA, $FAMILIA, $CUERPO, $FRENTE, $CANTO, $TRASCARA, $ESPESOR, $RUTA, $RUTA1, $RUTA2, $CAD_2D, $CAD3D, $FORMATO);


/*
			$productos[] = array(   "codigo" => $generico['codigo'],
								    "descripcion" => $generico['descripcion'],
								    "cuerpo" => NULL,
								    "frente" => NULL,
								    "canto" => NULL,
								    "espesor" => NULL,
								    "trascara" => NULL,
								    "generico" => 1 );
*/

/*
				$CODIGO_PRODUCTO = $generico['codigo'];
				$DESCRIPCION = $generico['descripcion'];
				$CATEGORIA = $generico['categoria'];
				$CODIGO_GENERICO = "";
				$TEMPORADA = 2;
				$FAMILIA = "generico";
				$CUERPO = NULL;
				$FRENTE = NULL;
				$CANTO = NULL;
				$TRASCARA = NULL;
				$ESPESOR = NULL;
				$RUTA = $generico['codigo'] . "_img.jpg";
				$RUTA1 = $generico['codigo'] . "_img_1.jpg";
				$RUTA2 = $generico['codigo'] . "_img_2.jpg";
				$CAD_2D = $generico['codigo'] . ".dwg";
				$CAD3D = $generico['codigo'] . ".dwg";
				$this->query->execute();
*/

			foreach ($productos as $k => $v) {

				$CODIGO_PRODUCTO = $v['codigo'];
				$DESCRIPCION = $v['descripcion'];
				$CATEGORIA = $generico['categoria'];
				$CODIGO_GENERICO = ( $v['generico'] == 1 ) ? "" : $generico['codigo'];
				$TEMPORADA = 2;
				$FAMILIA = ( $v['generico'] == 1 ) ? "generico" : $v['familia'] ;
				$CUERPO = "";
				$FRENTE = "";
				$CANTO = "";
				$TRASCARA = "";
				$ESPESOR = "";
				$RUTA = $v['codigo'] . "_img.jpg";
				$RUTA1 = $v['codigo'] . "_img_1.jpg";
				$RUTA2 = $v['codigo'] . "_img_2.jpg";
				$CAD_2D = $v['codigo'] . ".dwg";
				$CAD3D = $v['codigo'] . ".dwg";
				$FORMATO = "cu";
 				$this->query->execute();
			}

 				$this->query->close();

			return $this->query;
		}



	/**
	* 
	Busca Todos los colores por una superficie 
	*/
		public function proveedor_colores($prov, $cat, $cod, $des)
		{


			$superficies = $this->con->query("SELECT `nombre`, `codigo_color` FROM `colores_proveedor` WHERE `CODIGO_PROVEEDOR` = '".$prov."'");

			while($fila = $superficies->fetch_assoc()){

				$codigo_productos_final[] = array( "cod" => $cod . "." . $fila['codigo_color'],
												   "des" => str_replace("@", $fila['nombre'], $des),
												   "categoria" => $cat );
			}

			$superficies->free();

			return $codigo_productos_final;

		}



	/**
	* 
	Concatena codigo color y nombre color a la lista de codigos
	*/
		private function Concatenar_colores($regla_muebles, $codigo_productos, $des, $a, $cat, $id_sup_cat)
		{
				if ($regla_muebles) {

				$lista_col_sup = array();
				$b = "(";
				$colores = $this->con->query("SELECT `colores_superficie`.`nombre`, `colores_superficie`.`id_colores_superficie`, `colores_superficie`.`id_superficies`, `colores_superficie`.`codigo_color`  FROM `colores_superficie` WHERE `colores_superficie`.`id_superficies` IN$a");

				while($fila_c = $colores->fetch_assoc()){
				
					$lista_col_sup[$fila_c['id_superficies']][] = array( $fila_c['id_colores_superficie'] => array( "nombre" => $fila_c['nombre'],
						 "codigo_color" => $fila_c['codigo_color'],
						 "id" => $fila_c['id_colores_superficie'] )  );
					$b .= ($b == "(") ? "" : "," ;
					$b .= "'".$fila_c['id_colores_superficie']."'";

				}
				$b .= ")";
				$colores->free();



				$cantos = array();
				$id_cantos = $this->con->query("SELECT `categoria_producto_colores_superficie_cantos`.`id_cantos`, `categoria_producto_colores_superficie_cantos`.`id_colores_superficie`, `cantos`.`nombre`, `cantos`.`codigo_cantos`
FROM `categoria_producto_colores_superficie_cantos`, `cantos`
WHERE `categoria_producto_colores_superficie_cantos`.`id_colores_superficie` IN$b AND `categoria_producto_colores_superficie_cantos`.`id_categoria_producto` = '$cat'
AND `cantos`.`id_cantos` = `categoria_producto_colores_superficie_cantos`.`id_cantos`");
				while($fila_ic = $id_cantos->fetch_assoc()){
					$cantos[$fila_ic['id_colores_superficie']][] = array(  "nombre" => $fila_ic['nombre'],
																		   "codigo_canto" => $fila_ic['codigo_cantos'],
																		   "id_canto" => $fila_ic['id_cantos'] );
				}
				$id_cantos->free();

				foreach ($lista_col_sup as $k => $v) {
					foreach ($lista_col_sup[$k] as $k2 => $v2) {
						foreach ($lista_col_sup[$k][$k2] as $k3 => $v3) {

							if (isset($cantos[$k3])) {
								foreach ($cantos[$k3] as $k4 => $v4) {

									foreach ($lista_col_sup[1] as $k5 => $v5) {
										foreach ($lista_col_sup[1][$k5] as $k6 => $v6) {

											if (isset($cantos[$k6])) {
												foreach ($cantos[$k6] as $k7 => $v7) {
													$this->codigo_productos_final[$k]['pro'][] = array( "cod" => $codigo_productos[$k]['pro'][0]['cod'] . "." . $v6['codigo_color'] . $v7['codigo_canto'] . "." .  $v3['codigo_color'] .  $v4['codigo_canto'],
														"des" => str_replace("@", $codigo_productos[$k]['pro'][0]['des'] . " Cuerpo " . $v6['nombre'] . " Canto " . $v7['nombre'] . " Frente " . $v3['nombre'] . " Canto " . $v4['nombre'], $des),
														"cuerpo" => $v6['id'],
														"frente" => $v3['id'],
														"canto" => $v4['id_canto'],
														"espesor" => NULL,
														"trascara" => NULL,
														"familia" => $codigo_productos[$k]['pro'][0]['familia'] );	
												}
											}

										}
									}

								}
							}
							
						}
					}
				}



			} else {

				$lista_col_sup = array();
				$b = "(";
				$colores = $this->con->query("SELECT `colores_superficie`.`nombre`, `colores_superficie`.`id_colores_superficie`, `colores_superficie`.`id_superficies`, `colores_superficie`.`codigo_color`  FROM `colores_superficie` WHERE `colores_superficie`.`id_superficies` IN$a");

				while($fila_c = $colores->fetch_assoc()){
				
					$lista_col_sup[$fila_c['id_superficies']][] = array( $fila_c['id_colores_superficie'] => array( "nombre" => $fila_c['nombre'],
						"codigo_color" => $fila_c['codigo_color'],
						"id" => $fila_c['id_colores_superficie'] )  );


					$b .= ($b == "(") ? "" : "," ;
					$b .= "'".$fila_c['id_colores_superficie']."'";

				}
				$b .= ")";
				$colores->free();





				$lista_espesor = array();
				$espesor_q = $this->con->query("SELECT `espesor`.`id_espesor`, `espesor`.`nombre`, `espesor`.`codigo_espesor`, `superficies_categoria_producto`.`id_superficies` FROM `espesor`, `superficies_categoria_producto_espesor`, `superficies_categoria_producto` 
WHERE `superficies_categoria_producto_espesor`.`id_superficies_categoria_producto` IN$id_sup_cat
AND `espesor`.`id_espesor` = `superficies_categoria_producto_espesor`.`id_espesor`
AND `superficies_categoria_producto`.`id_superficies_categoria` = `superficies_categoria_producto_espesor`.`id_superficies_categoria_producto`");
				while($fila_eq = $espesor_q->fetch_assoc()){

					$lista_espesor[$fila_eq['id_superficies']][] = array( "nombre" => $fila_eq['nombre'],
											  							"codigo_espesor" => $fila_eq['codigo_espesor'],
											  							"id_espesor" => $fila_eq['id_espesor'] );

				}
				$espesor_q->free();







				$lista_trascara = array();
				$trascara_q = $this->con->query("SELECT `trascara`.`id_trascara`, `trascara`.`nombre`, `trascara`.`codigo_trascara`, `superficies_categoria_producto`.`id_superficies` 
FROM `trascara`, `superficies_categoria_producto_trascara`, `superficies_categoria_producto` 
WHERE `superficies_categoria_producto_trascara`.`id_superficies_categoria_producto` IN$id_sup_cat 
AND `trascara`.`id_trascara` = `superficies_categoria_producto_trascara`.`id_trascara`
AND `superficies_categoria_producto`.`id_superficies_categoria` = `superficies_categoria_producto_trascara`.`id_superficies_categoria_producto`");
				while($fila_tq = $trascara_q->fetch_assoc()){

					$lista_trascara[$fila_tq['id_superficies']][] = array( "nombre" => $fila_tq['nombre'],
											  							   "codigo_trascara" => $fila_tq['codigo_trascara'],
											  							   "id_trascara" => $fila_tq['id_trascara'] );


				}
				$trascara_q->free();








				$cantos = array();
				$id_cantos = $this->con->query("SELECT `categoria_producto_colores_superficie_cantos`.`id_cantos`, `categoria_producto_colores_superficie_cantos`.`id_colores_superficie`, `cantos`.`nombre`, `cantos`.`codigo_cantos`
FROM `categoria_producto_colores_superficie_cantos`, `cantos`
WHERE `categoria_producto_colores_superficie_cantos`.`id_colores_superficie` IN$b AND `categoria_producto_colores_superficie_cantos`.`id_categoria_producto` = '$cat'
AND `cantos`.`id_cantos` = `categoria_producto_colores_superficie_cantos`.`id_cantos`");
				while($fila_ic = $id_cantos->fetch_assoc()){
					$cantos[$fila_ic['id_colores_superficie']][] = array(  "nombre" => $fila_ic['nombre'],
																		   "codigo_canto" => $fila_ic['codigo_cantos'],
																		   "id_canto" => $fila_ic['id_cantos'] );
				}
				$id_cantos->free();

				foreach ($lista_col_sup as $k => $v) {
					foreach ($lista_col_sup[$k] as $kk => $vv) {
						foreach ($lista_col_sup[$k][$kk] as $kkk => $vvv) {

							if (isset($cantos[$kkk])) {
								foreach ($cantos[$kkk] as $kkkk => $vvvv) {


									if (isset($lista_espesor[$k])) {

										foreach ($lista_espesor[$k] as $k5 => $v5) {
										
											if (isset($lista_trascara[$k])) {

												foreach ($lista_trascara[$k] as $k6 => $v6) {

													$this->codigo_productos_final[$k]['pro'][] = array( "cod" => $codigo_productos[$k]['pro'][0]['cod'] . "." . $vvv['codigo_color'] . "." . $vvvv['codigo_canto'] . "." . $v5['codigo_espesor'] . "." . $v6['codigo_trascara'],
														"des" => str_replace("@", $codigo_productos[$k]['pro'][0]['des'] . " " . $vvv['nombre'] . " Canto " . $vvvv['nombre'] . " " . $v5['nombre'] . " " . $v6['nombre'], $des),
														"cuerpo" => $vvv['id'],
														"frente" => NULL,
														"canto" => $vvvv['id_canto'],
														"espesor" => $v5['id_espesor'],
														"trascara" => $v6['id_trascara'],
														"familia" => $codigo_productos[$k]['pro'][0]['familia'] );

												}

											
											} else {
													$this->codigo_productos_final[$k]['pro'][] = array( "cod" => $codigo_productos[$k]['pro'][0]['cod'] . "." . $vvv['codigo_color'] . "." . $vvvv['codigo_canto'] . "." . $v5['codigo_espesor'],
														"des" => str_replace("@", $codigo_productos[$k]['pro'][0]['des'] . " " . $vvv['nombre'] . " Canto " . $vvvv['nombre'] . " " . $v5['nombre'], $des),
														"cuerpo" => $vvv['id'],
														"frente" => NULL,
														"canto" => $vvvv['id_canto'],
														"espesor" => $v5['id_espesor'],
														"trascara" => NULL,
														"familia" => $codigo_productos[$k]['pro'][0]['familia'] );
											}
											


										


										}									
									
									} else {




											if (isset($lista_trascara[$k])) {

												foreach ($lista_trascara[$k] as $k6 => $v6) {

												$this->codigo_productos_final[$k]['pro'][] = array( "cod" => $codigo_productos[$k]['pro'][0]['cod'] . "." . $vvv['codigo_color'] . "." . $vvvv['codigo_canto'] . "." . $v6['codigo_canto'],
													"des" => str_replace("@", $codigo_productos[$k]['pro'][0]['des'] . " " . $vvv['nombre'] . " Canto " . $vvvv['nombre'] . " " . $v6['nombre'], $des),
														"cuerpo" => $vvv['id'],
														"frente" => NULL,
														"canto" => $vvvv['id_canto'],
														"espesor" => NULL,
														"trascara" => $v6['id_trascara'],
														"familia" => $codigo_productos[$k]['pro'][0]['familia']  );

												}

											
											} else {
												$this->codigo_productos_final[$k]['pro'][] = array( "cod" => $codigo_productos[$k]['pro'][0]['cod'] . "." . $vvv['codigo_color'] . "." . $vvvv['codigo_canto'],
													"des" => str_replace("@", $codigo_productos[$k]['pro'][0]['des'] . " " . $vvv['nombre'] . " Canto " . $vvvv['nombre'], $des),
														"cuerpo" => $vvv['id'],
														"frente" => NULL,
														"canto" => $vvvv['id_canto'],
														"espesor" => NULL,
														"trascara" => NULL,
														"familia" => $codigo_productos[$k]['pro'][0]['familia']  );
											}
									
									}
									
								}
							}

						}
					}
				}

			}
			return $this->codigo_productos_final;
		}

	}

?>