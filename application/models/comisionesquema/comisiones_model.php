<?php
class Comisiones_model extends CI_Model{

    function __construct()
    {
   		       $this->load->database();
    }
    public function getTablaComisiones(){
            	$query = $this->db->query('select * from empresa where not idEmpresa=5 and fechaEliminacion="0000-00-00 00:00:00";');
                return $query->result_array();
    }

    public function getTablaUnidadNeggocio(){
                $query = $this->db->query('SELECT * FROM un WHERE activo=1 AND fechaEliminacion="0000-00-00 00:00:00" AND NOT idEmpresa in (5);');
                return $query->result_array();

    }

    public function getGridHitRate($idEmpresa){
                $query = $this->db->query('select * from esquemahitrate where idUn = "'.$idEmpresa.'" ');
                return $query->result_array();
    }
    public function insertHitRate($data){
                $this->db->insert('esquemahitrate',$data); 
    }
    public function updateHitRate($data,$idEsquema){
                $this->db->where('idEsquemaHitRate', $idEsquema);
                $this->db->update('esquemahitrate', $data); 
    }
    public function getTablaPuestos(){
                $query = $this->db->query('SELECT * FROM puesto WHERE fechaEliminacion="0000-00-00 00:00:00";');
                return $query->result_array();
    }
    public function getTablaCategoria(){
                $query = $this->db->query('SELECT * FROM categoria WHERE activo=1 AND idCategoria IN (2,6,8,9,12);');
                return $query->result_array();
    }
    public function  getTablaProducto(){
                $query = $this->db->query('SELECT * FROM  producto WHERE  activo=1 AND  finVigencia > now() AND idCategoria IN (2,6,8,9,12);');
                return $query->result_array();
    }
    public function  getTablaProductoGrid($params){
                $query = $this->db->query("SELECT * FROM  producto WHERE  activo=1 AND  finVigencia > now() AND idCategoria IN (".$params.");");
                return $query->result_array();
    }
    public function getTablaConvenio(){
                $query = $this->db->query('SELECT conve.idConvenio,convedeta.idConvenioDetalle, conve.nombre,convedeta.descripcion,convedeta.fechaFin 
                                            FROM convenio conve , conveniodetalle convedeta 
                                            WHERE (conve.idConvenio=convedeta.idConvenio)  AND convedeta.fechaFin >now() AND conve.fechaEliminacion="0000-00-00 00:00:00";');
                return $query->result_array();

    }
    public function getTablaPromocion(){
                $query = $this->db->query('SELECT * FROM paquete WHERE activo=1 AND finVigencia > now();');
                return $query->result_array();
    }
    public function getTablaEsquemaHitRate($idEsquemaHitRate){
            $query = $this->db->query('SELECT * FROM esquemahitrate WHERE idEsquemaHitRate="'.$idEsquemaHitRate.'"');
            return $query->result_array();
    }
    public function getTablaDetalleComision($idEmpresa){
                $query = $this->db->query("SELECT u.idUn,u.nombre, cr.mes, crd.numeroMinimo AS numero, crd.montoMinimo AS monto, cr.anio as año, 
                                         crd.q1, crd.q2,crd.factor
                                        FROM un u
                                        INNER JOIN empresa e ON e.idEmpresa=u.idEmpresa
                                        LEFT JOIN comisionregla cr ON cr.idUn=u.idUn AND cr.anio=YEAR(now()) AND cr.idTipoQuincena=3
                                            AND cr.idTipoComision=2 and cr.mes=month(now())
                                        LEFT JOIN comisionregladetalle crd ON crd.idComisionRegla=cr.idComisionRegla
                                            AND crd.fechaEliminacion='0000-00-00 00:00:00' 
                                        WHERE u.idEmpresa=$idEmpresa and not u.idUn in(1,82,83,84,7,8)  and  u.activo=1;");
                return $query->result_array();
    }
    public function getComisionDetalle($idUn){
                $query = $this->db->query("SELECT crd.idComisionReglaDetalle,u.idUn,u.nombre, cr.mes, crd.numeroMinimo AS numero, crd.montoMinimo AS monto, cr.anio as año, 
                    crd.q1, crd.q2,crd.factor
                    FROM un u
                    INNER JOIN empresa e ON e.idEmpresa=u.idEmpresa
                    LEFT JOIN comisionregla cr ON cr.idUn=u.idUn AND cr.anio=YEAR(now()) AND cr.idTipoQuincena=3
                        AND cr.idTipoComision=2 and cr.mes=month(now())
                    LEFT JOIN comisionregladetalle crd ON crd.idComisionRegla=cr.idComisionRegla
                        AND crd.fechaEliminacion='0000-00-00 00:00:00' 
                    WHERE u.idUn=$idUn AND NOT u.idUn in(1,82,83,84,7,8)  AND  u.activo=1 AND cr.mes=month(now());");
                return $query->result_array();
    }
    public function updateComisionDetalle($data,$idComisionReglaDetalle){
                $this->db->where('idComisionReglaDetalle',$idComisionReglaDetalle);
                $this->db->update('comisionregladetalle', $data); 
    }
    public function infoProspeccionXMEsHitRate($idUn){
                $query = $this->db->query("SELECT u.idEmpresa, u.idUn,u.nombre, crd.numeroMinimo AS meta_mensaul_de_venta_club,(crd.numeroMinimo*crd.factor) AS meta_prospeccion_mensual,
                                            crd.montoMinimo AS monto_presupuesto_mensual, 
                                            crd.q1 AS vendedores_quincena1,((crd.numeroMinimo/2)/crd.q1) AS meta_de_venta_q1_x_vendedor, (((crd.numeroMinimo*crd.factor)/2)/crd.q1) AS meta_de_prospeccion_q1_x_vendedor,
                                            crd.q2 AS vendedores_quincena2,((crd.numeroMinimo/2)/crd.q2) AS meta_de_venta_q2_x_vendedor, (((crd.numeroMinimo*crd.factor)/2)/crd.q2) AS meta_de_prospeccion_q2_x_vendedor
                                               FROM un u
                                               INNER JOIN comisionregla cr ON cr.idUn=u.idUn AND cr.anio=YEAR(now()) AND cr.idTipoQuincena=3
                                                   AND cr.idTipoComision=2 AND cr.mes=month(now())
                                               INNER JOIN comisionregladetalle crd ON crd.idComisionRegla=cr.idComisionRegla
                                                   AND crd.fechaEliminacion='0000-00-00 00:00:00' AND objetivo=1
                                               WHERE  u.idUn=$idUn and  u.activo=1 and not idEmpresa=5;
                                               ");
                return $query->result_array();
    }
    public function insertReporteComision($data){
                $this->db->insert('configuracionreportecomisiones',$data); 
    }
    public function getTablaEsquemas(){
                $query = $this->db->query('SELECT* FROM configuracionreportecomisiones;');
                return $query->result_array();
    }
    ///////////////////REPORTE HIT RATE GRIN CLUB INDIVIDUAL PARA CONTROLADOR unidadNegocioHitRate////////////
    public function getIdPuestosUnidadNegocios($idEsquema,$idUnidadNegocios){
            
            $query = $this->db->query("SELECT * FROM configuracionreportecomisiones WHERE IdReporteComision='".$idEsquema."'");
            $arraypuestos = $query->result_array();
            foreach ($arraypuestos as $key) {
                $idPuesto= $key["puestos"];
            }
            $query2 = $this->db->query("SELECT puesto.idEmpleado,CONCAT_WS(' ',per.nombre,per.paterno,per.materno)  as nombre, unneg.nombre as club
                                        FROM empleadopuesto puesto, tipoestatusempleado sta, empleado empl, persona per, un unneg
                                        WHERE (empl.idEmpleado=puesto.idEmpleado) AND
                                        (unneg.idUn=puesto.idUn) AND
                                        (empl.idTipoEstatusEmpleado=sta.idTipoEstatusEmpleado)AND
                                        (per.idPersona=empl.idPersona)
                                        AND puesto.fechaEliminacion='0000-00-00 00:00:00' AND puesto.idPuesto in($idPuesto) 
                                        AND puesto.idUn=$idUnidadNegocios AND NOT sta.idTipoEstatusEmpleado IN (197,198)");
           return  $query2->result_array();
    }

    public function getTablaVentasPiso($idEmpleados){
            $query = $this->db->query("SELECT count(cm.idPersona) as suma, cm.idPersona,emple.idEmpleado,
                                        CONCAT_WS(' ',per.nombre,per.paterno,per.materno) as nombre_ejecutivo
                                        from comision cm , comisionmovimiento cmov, movimiento mv, membresia memb, producto pr, categoria cate,
                                        persona per, empleado emple, empleadopuesto emplepuesto, puesto pues,un unneg
                                        where (cm.idComision=cmov.idComision) and 
                                                    (cmov.idMovimiento=mv.idMovimiento)and 
                                                    (mv.idUnicoMembresia=memb.idUnicoMembresia)and 
                                                    (memb.idProducto=pr.idProducto)and 
                                                    (pr.idCategoria=cate.idCategoria)and 
                                                    (cm.idPersona=per.idPersona)and 
                                                    (cm.idPersona=emple.idPersona)and
                                                    (emple.idEmpleado=emplepuesto.idEmpleado)and
                                                    (pues.idPuesto=emplepuesto.idPuesto)and
                                                    (cm.idUn=unneg.idUn) and
                                                    emplepuesto.fechaActualizacion='0000-00-00 00:00:00' and
                                                    emplepuesto.fechaEliminacion='0000-00-00 00:00:00' and
                                                    fechaAplica BETWEEN '2016-09-01' and '2016-09-15' and
                                                    pr.idProducto IN (1,6,7,43,9,1912,2807,1952,49,2515,2516,2517,2518) and
                                                    memb.idConvenioDetalle=0 and       
                                                    pues.idPuesto in(96,771) and
                                                    emple.idEmpleado in($idEmpleados)
                                                    group by cm.idPersona;");
            return $query->result_array();

    }

    public function getVentasPisoResumen($idEmpleados){

            $query = $this->db->query("SELECT cm.idComision as idComision,cm.descripcion,mv.descripcion as descripcionMovimiento,
                                        pr.nombre as decproducto,cm.fechaAplica,
                                        cm.regla,cm.idPersona,emple.idEmpleado,
                                        CONCAT_WS('',per.nombre,per.paterno,per.materno) as nombre_ejecutivo,
                                        pues.descripcion,unneg.nombre as unidad_negocios,
                                        mv.importe as importe_movimiento
                                        from comision cm , comisionmovimiento cmov, movimiento mv, membresia memb, producto pr, categoria cate,
                                        persona per, empleado emple, empleadopuesto emplepuesto, puesto pues,un unneg
                                        where (cm.idComision=cmov.idComision)AND
                                        (cmov.idMovimiento=mv.idMovimiento)AND
                                        (mv.idUnicoMembresia=memb.idUnicoMembresia)AND
                                        (memb.idProducto=pr.idProducto)AND
                                        (pr.idCategoria=cate.idCategoria)AND
                                        (cm.idPersona=per.idPersona)AND
                                        (cm.idPersona=emple.idPersona)AND
                                        (emple.idEmpleado=emplepuesto.idEmpleado)AND
                                        (pues.idPuesto=emplepuesto.idPuesto)AND
                                        (cm.idUn=unneg.idUn) AND
                                        emplepuesto.fechaActualizacion='0000-00-00 00:00:00'AND
                                        emplepuesto.fechaEliminacion='0000-00-00 00:00:00'AND
                                        fechaAplica BETWEEN '2016-09-01' AND '2016-09-15'AND
                                        pr.idProducto IN (1,6,7,43,9,1912,2807,1952,49,2515,2516,2517,2518)AND
                                        memb.idConvenioDetalle=0 AND       
                                        pues.idPuesto IN(96,771)AND
                                        emple.idEmpleado IN($idEmpleados) ORDER BY emple.idEmpleado asc;");
            return $query->result_array();

    }

    public function getTablaVentasConvenios($idEmpleados){
            $query = $this->db->query("SELECT count(cm.idPersona) as suma,cm.idPersona,emple.idEmpleado,
                                    CONCAT_WS(' ',per.nombre,per.paterno,per.materno) as nombre_ejecutivo
                                    from comision cm , comisionmovimiento cmov, movimiento mv, membresia memb, conveniodetalle convdet,convenio conve,
                                    persona per, empleado emple, empleadopuesto emplepuesto, puesto pues,un unneg
                                    where (cm.idComision=cmov.idComision) and 
                                                (cmov.idMovimiento=mv.idMovimiento)and 
                                                (mv.idUnicoMembresia=memb.idUnicoMembresia)and 
                                                (memb.idConvenioDetalle=convdet.idConvenioDetalle)and
                                                (convdet.idConvenio=conve.idConvenio)and 
                                                (cm.idPersona=per.idPersona)and 
                                                (cm.idPersona=emple.idPersona)and
                                                (emple.idEmpleado=emplepuesto.idEmpleado)and
                                                (pues.idPuesto=emplepuesto.idPuesto)and
                                                (cm.idUn=unneg.idUn) and 
                                                emplepuesto.fechaActualizacion='0000-00-00 00:00:00' and
                                                emplepuesto.fechaEliminacion='0000-00-00 00:00:00' and
                                                fechaAplica BETWEEN '2016-09-01' and '2016-09-15' and
                                                memb.idConvenioDetalle > 0 and 
                                                pues.idPuesto in(96,771) and 
                                                emple.idEmpleado in($idEmpleados)
                                                group by cm.idPersona;");
            return $query->result_array();
    }
    public function getVentasConvenioResumen($idEmpleados){
            $query = $this->db->query("SELECT cm.idComision as idComision,cm.descripcion,mv.descripcion AS descripcionMovimiento,
                                    cm.fechaAplica,cm.regla,cm.idPersona,emple.idEmpleado,
                                    CONCAT_WS(' ',per.nombre,per.paterno,per.materno) as nombre_ejecutivo,
                                    pues.descripcion,unneg.nombre as unidad_negocios,
                                    mv.importe as importe_movimiento,
                                    conve.nombre as nombre_convenio,
                                    convdet.idTipoConvenio as tipo_convenio
                                    from comision cm , comisionmovimiento cmov, movimiento mv, membresia memb, conveniodetalle convdet,convenio conve,
                                    persona per, empleado emple, empleadopuesto emplepuesto, puesto pues,un unneg
                                    where (cm.idComision=cmov.idComision) and 
                                    (cmov.idMovimiento=mv.idMovimiento)and 
                                    (mv.idUnicoMembresia=memb.idUnicoMembresia)and 
                                    (memb.idConvenioDetalle=convdet.idConvenioDetalle)and
                                    (convdet.idConvenio=conve.idConvenio)and 
                                    (cm.idPersona=per.idPersona)and 
                                    (cm.idPersona=emple.idPersona)and
                                    (emple.idEmpleado=emplepuesto.idEmpleado)and
                                    (pues.idPuesto=emplepuesto.idPuesto)and
                                    (cm.idUn=unneg.idUn) and 
                                    emplepuesto.fechaActualizacion='0000-00-00 00:00:00' and
                                    emplepuesto.fechaEliminacion='0000-00-00 00:00:00' and
                                    fechaAplica BETWEEN '2016-09-01' and '2016-09-15' and
                                    memb.idConvenioDetalle > 0 and 
                                    pues.idPuesto in(96,771) and 
                                    emple.idEmpleado IN($idEmpleados) ORDER BY emple.idEmpleado asc;");
            return $query->result_array();

    }

    public function getTablaProspectos($idEmpleados,$idUnidadNegocios){
            $query = $this->db->query("SELECT count(prosc.idEmpleado) as sumaprospectos, (count(prosc.idEmpleado)/(SELECT ROUND ((((crd.numeroMinimo*                       crd.factor)/2)/crd.q1)) AS meta_de_prospeccion_q1_x_vendedor
                                        FROM un u
                                        INNER JOIN comisionregla cr ON cr.idUn=u.idUn AND cr.anio=YEAR(now()) AND cr.idTipoQuincena=3
                                        AND cr.idTipoComision=2 AND cr.mes=month(now())
                                        INNER JOIN comisionregladetalle crd ON crd.idComisionRegla=cr.idComisionRegla
                                        AND crd.fechaEliminacion='0000-00-00 00:00:00' AND objetivo=1
                                        WHERE  u.idUn=$idUnidadNegocios and  u.activo=1 and not idEmpresa=5)*100) as alcanceprospectos ,prosc.idEmpleado,emple.idPersona, 
                                        CONCAT_WS(' ',per.nombre,per.paterno, per.materno) nombre
                                        FROM prospectovendedor prosc, empleado emple,un uneg, persona per
                                        WHERE (prosc.idEmpleado=emple.idEmpleado)and 
                                        (prosc.idUn=uneg.idUn)and 
                                        (emple.idPersona=per.idPersona)and
                                        prosc.fechaREgistro  between '2016-09-01' and '2016-09-15' and
                                        emple.idEmpleado in($idEmpleados) 
                                        group by prosc.idEmpleado;");
            return $query->result_array();
    }

    public function getVentaTotal($idEmpleados,$idUnidadNegocios){
            $query = $this->db->query("SELECT count(cm.idPersona) as venta,(count(cm.idPersona)/(SELECT ROUND ((((crd.numeroMinimo*crd.factor)/2)/crd.q1)) AS meta_de_prospeccion_q1_x_vendedor
                                        FROM un u
                                        INNER JOIN comisionregla cr ON cr.idUn=u.idUn AND cr.anio=YEAR(now()) AND cr.idTipoQuincena=3
                                        AND cr.idTipoComision=2 AND cr.mes=month(now())
                                        INNER JOIN comisionregladetalle crd ON crd.idComisionRegla=cr.idComisionRegla
                                        AND crd.fechaEliminacion='0000-00-00 00:00:00' AND objetivo=1
                                        WHERE  u.idUn=$idUnidadNegocios and  u.activo=1 and not idEmpresa=5)*100) as hitrate  , cm.idPersona,cm.idUn, CONCAT_WS(' ',per.nombre,per.paterno,per.materno) as nombre
                                        from  comision cm,  persona per, empleado emp where 
                                        (cm.idPersona=per.idPersona) and
                                        (emp.idPersona=per.idPersona) and    
                                        fechaAplica BETWEEN '2016-09-01' and '2016-09-15' and idTipoComision=1 and
                                        emp.idEmpleado in ($idEmpleados) 
                                        group by idPersona;");
            return $query->result_array();
    }
    /////////////////// FIN DE REPORTE HIT RATE GRIN CLUB INDIVIDUAL PARA CONTROLADOR unidadNegocioHitRate////////////
}
?>