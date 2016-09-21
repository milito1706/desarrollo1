<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comisonesnew extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function inicio(){
			$this->load->model("comisionesquema/comisiones_model");
			$Rstabla = $this->comisiones_model->getTablaUnidadNeggocio();
			$data['tablun'] = $Rstabla;
			$this->load->view('esquemacomision/hitratehome.php',$data);
	}
	public function formularioCom(){
			$this->load->model("comisionesquema/comisiones_model");
			$Rshit = $this->comisiones_model->getGridHitRate($this->input->post('idEmpresa'));
			$data['hitRate']= $Rshit;
			$data['idEmpresa']= $this->input->post('idEmpresa');
			$data['nombreEmpresa']=$this->input->post('nombreEmpresa');
			$this->load->view('esquemacomision/formularioHitRate',$data);
	}
	public function formularioVariable(){
		$data['idEmpresa']= $this->input->post('idEmpresa');
		$this->load->view('esquemacomision/formularioConfiguraHitRate',$data);
	}
	public function setFormularioCom(){
			$idEsquema = $this->input->post('idEsquema');
			$data = array(
				'idUn'=>$this->input->post('idEmpresa'),
				'alcanceProspectos'=>$this->input->post('alcanceProspecto'),
				'hitRate'=>$this->input->post('hitRate'),
				'comisionFija'=>$this->input->post('comisionFija'),
				'comisionAdicional'=>$this->input->post('comisionAdicional'),
				'comisonTotal'=>$this->input->post('comisionTotal')
			);
			if($idEsquema > 0){
				$this->load->model('comisionesquema/comisiones_model');
				$this->comisiones_model->updateHitRate($data,$idEsquema);	
			}
			else{
				$this->load->model('comisionesquema/comisiones_model');
				$this->comisiones_model->insertHitRate($data);	
			}
	}
	public function inicio2(){
			$this->load->model("comisionesquema/comisiones_model");
			$Rstablaesquemas = $this->comisiones_model->getTablaEsquemas();
			$data['tablaesquemas'] = $Rstablaesquemas;
			$this->load->view('esquemacomision/configuracionReportes.php',$data);
	}
	public function formularioConfiguracionReporte(){
			$this->load->model("comisionesquema/comisiones_model");
			$RstablaPusto 		 	= $this->comisiones_model->getTablaPuestos();
			$data['tablapuesto'] 	= $RstablaPusto;
			$RstablaCategoria 	 	= $this->comisiones_model->getTablaCategoria();
			$data['tablacategoria'] = $RstablaCategoria;
			$RstablaProducto 	 	= $this->comisiones_model->getTablaProducto();
			$data['tablaproducto'] 	= $RstablaProducto;
			$RstablaConvenio		= $this->comisiones_model->getTablaConvenio();
			$data['tablaconvenio']	= $RstablaConvenio;
			$RstablaPromocion		= $this->comisiones_model->getTablaPromocion();
			$data['tablapromocion']	= $RstablaPromocion;
			$this->load->view('esquemacomision/multiple',$data);
	}
	public function formularioGridReporteProductos(){
		$this->load->model("comisionesquema/comisiones_model");
		$RstablaProducto 	 	= $this->comisiones_model->getTablaProductoGrid($this->input->post("listProductos"));
		$data['tablaproducto'] 	= $RstablaProducto;
		$this->load->view('esquemacomision/multipleProductoGrid',$data);

	}
	public function formularioVariableUpdate(){
			$data['idEmpresa']= $this->input->post('idEmpresa');
			$idEsquema = $this->input->post('idEsquema');
			$this->load->model("comisionesquema/comisiones_model");
			$Rstablaesquema = $this->comisiones_model->getTablaEsquemaHitRate($idEsquema);
			foreach ($Rstablaesquema as $key){
				$data['idEsquemaHitRate']  = $key['idEsquemaHitRate'];
				$data['alcanceProspecto']  = $key['alcanceProspectos'];
				$data['hitRate'] 		   = $key['hitRate'];
				$data['comisionFija']      = $key['comisionFija'];
				$data['comisionAdicional'] = $key['comisionAdicional'];
				$data['comisionTotal']     = $key['comisonTotal'];
			}
			$this->load->view('esquemacomision/formularioConfiguraHitRate',$data);
	}
	public function gridUnidadNegocio($idEmpresa,$idEsquema){
			$data['idEsquema']=$idEsquema;
			$this->load->model("comisionesquema/comisiones_model");
			$Rstabla = $this->comisiones_model->getTablaDetalleComision($idEmpresa);
			$data['tabladetallecomision'] = $Rstabla;
			$this->load->view('esquemacomision/gridUnidadNegocios.php',$data);
	}
	public function formularioConfiguracionAlcance(){
			$idUn=$this->input->post('idUn');
			$this->load->model("comisionesquema/comisiones_model");
			$RsComDetalle = $this->comisiones_model->getComisionDetalle($idUn);
			foreach ($RsComDetalle as $key => $value) {
				$data["idComisionReglaDetalle"]			=$value["idComisionReglaDetalle"];
				$data["nombre"] =$value['nombre'];
			 	$data["mes"]    =$value['mes'];
			 	$data["numero"] =$value['numero'];
			 	$data["monto"]  =$value['monto'];
			 	$data["año"]    =$value['año'];
			 	$data["q1"]     =$value['q1'];
			 	$data["q2"]     =$value['q2'];
			 	$data["factor"] =$value['factor'];
			}
			$this->load->view('esquemacomision/formularioConfiguraVariableAlcance.php',$data);
	}
	public function setFormularioConfiguraAlcace(){
		   $idComisionReglaDetalle = $this->input->post('idComisionReglaDetalle');
			$data = array(
				'numeroMinimo'=>$this->input->post('numeroMes'),
				'montoMinimo'=>$this->input->post('metaClub'),
				'factor'=>$this->input->post('factor'),
				'q1'=>$this->input->post('q1'),
				'q2'=>$this->input->post('q2')
			);
			
				$this->load->model('comisionesquema/comisiones_model');
				$this->comisiones_model->updateComisionDetalle($data,$idComisionReglaDetalle);	
	}
	public function infoModalMesEsquemaHitRate(){
			$idUn=$this->input->post('idUn');
			$this->load->model('comisionesquema/comisiones_model');
			$RsTablaResumenxMes = $this->comisiones_model->infoProspeccionXMEsHitRate($idUn);	
			foreach ($RsTablaResumenxMes as $key){
				$data["nombreUni"] 					= $key["nombre"];
				$data["metaMensual"] 				= $key["meta_mensaul_de_venta_club"];
				$data["metaProspeccionMen"] 		= $key["meta_prospeccion_mensual"];
				$data["motoPresupuestoMen"] 		= $key["monto_presupuesto_mensual"];
				$data["vendedoresQ1"] 				= $key["vendedores_quincena1"];
				$data["metaVendedorQ1"] 			= round(($key["meta_de_venta_q1_x_vendedor"]*100)/100);
				$data["metaVendedorPeospeccionQ1"] 	= round(($key["meta_de_prospeccion_q1_x_vendedor"]*100)/100);
				$data["vendedoresQ2"] 				= $key["vendedores_quincena2"];
				$data["metaVendedorQ2"] 			= round(($key["meta_de_venta_q2_x_vendedor"]*100)/100);
				$data["metaVendedorPeospeccionQ2"] 	= round(($key["meta_de_prospeccion_q2_x_vendedor"]*100)/100);
			}
			$this->load->view('esquemacomision/gridProspeccionMensual.php',$data);
	}
	public function setInsertMultiple(){
			echo $arrayCodigoPuesto 		= $this->input->post("codigoPusesto");
			echo $arrayCategoriaProductos 	= $this->input->post("categoriaProductos");
			echo $arrayProductos 			= $this->input->post("productos");
			echo $arrayConvenios 			= $this->input->post("convenios");
			echo $arrayPaquetes 			= $this->input->post("paquetes");
			$data = array(
				'nombreReporte'=>$this->input->post("nombreReporte"),
				'nombreEsquema'=>$this->input->post("nombreEsquema"),
				'puestos'=>$arrayCodigoPuesto,
				'categoriaProductos'=>$arrayCategoriaProductos,
				'productos'=>$arrayProductos,
				'convenios'=>$arrayConvenios,
				'promociones'=>$arrayPaquetes,
				'queryPiso'=>"hola maria",
				'queryConvenio'=>"hola octavio",
				'fechaVigencia'=>$this->input->post("fechaVigencia")
			);
			$this->load->model('comisionesquema/comisiones_model');
			$this->comisiones_model->insertReporteComision($data);

	}

	public function reporteHitRate($idEsquema){
			$data['idEsquema']=$idEsquema;
			$this->load->model("comisionesquema/comisiones_model");
			$Rstabla = $this->comisiones_model->getTablaComisiones();
			$data['tablacomision'] = $Rstabla;
			$this->load->view('esquemacomision/reporteHitRate.php',$data);

	}

	public function unidadNegocioHitRate($idUnidadNegocio,$idEsquema){
			
			$this->load->model("comisionesquema/comisiones_model");
			 $RstablaIdEmpleados = $this->comisiones_model->getIdPuestosUnidadNegocios($idEsquema,$idUnidadNegocio);
			 $idEmpleados = '';
            foreach ($RstablaIdEmpleados as $key) {   
               $idEmpleados .= $key["idEmpleado"].","; 
            
            }
             $data['empleadosVentas']=$RstablaIdEmpleados;
             $idEmpleados = substr($idEmpleados, 0, -1);   
			 $RsTablaVentasPiso				 = $this->comisiones_model->getTablaVentasPiso($idEmpleados);
			 $RsTablaVentasConvenio			 = $this->comisiones_model->getTablaVentasConvenios($idEmpleados);
			 $RsTablaProspectos				 = $this->comisiones_model->getTablaProspectos($idEmpleados,$idUnidadNegocio);
			 $RsTablVentasPisoResumen		 = $this->comisiones_model->getVentasPisoResumen($idEmpleados);
			 $RsTablVentasConvenioResumen	 = $this->comisiones_model->getVentasConvenioResumen($idEmpleados);
			 $RsTablVentastotal    			 = $this->comisiones_model->getVentaTotal($idEmpleados,$idUnidadNegocio);
			 $data['tablaVentasPiso']		 	= $RsTablaVentasPiso;
			 $data['tablaVentasConvenio']	 	= $RsTablaVentasConvenio; 
			 $data['tablaProspectos']		 	= $RsTablaProspectos;
			 $data['tablaVentasPisoResumen'] 	= $RsTablVentasPisoResumen;
			 $data['tablaVentaConvenioResumen']	= $RsTablVentasConvenioResumen;
			 $data['tablaVentaTotal'] 			= $RsTablVentastotal;
			

			$this->load->view("esquemacomision/reporteUnidadNegocioHitRate",$data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */