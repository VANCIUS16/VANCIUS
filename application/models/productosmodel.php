<?php

class ProductosModel extends CI_Model {
    function __construct()
    {
        $this->load->database();
    }

    //Metodo se soporte de pagnación

    function getPart($pagination, $segment) {
        
        $sql = "SELECT * FROM productos p
                WHERE NProducto <> ''
                ORDER BY p.NProducto
                LIMIT $segment, $pagination";
        $query = $this->db->query($sql);        
        return $query->result_array();
    }


    // devuelve la descripcion del producto y su inventario

    function getDesc($NProducto) {

        $sql = "SELECT  p.NProducto
                ,   p.Producto
                -- ,   i.Cantidad_Rollos
                -- ,   i.Cantidad_Etiquetas
                -- ,   u.Descripcion AS Unidad
                FROM productos p
                -- LEFT JOIN inventario_stock i ON p.NProducto = i.NProducto
                -- LEFT JOIN inventario_stock_cat_unidades u ON i.IDUnidad_stock = u.IDUnidad_stock
                WHERE p.NProducto = '$NProducto'";

        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function searchInOProd($segment) {
        $sql = "SELECT NProducto,Producto FROM productos
                WHERE REPLACE(CONCAT(NProducto,Producto),' ','') LIKE '%$segment%'";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    /*********************************************
    *
    * metodos de trabajo
    *
    **********************************************/

    /**
    * Obtiene la ficha tecnica del producto
    * @param string refCat
    * @return row object
    */

    function getInfo($refCat) {
        $sql = "SELECT
                  refCat,
                  Titulo,
                  Contenido,
                  Contenido_2,
                  img_dir,
                  datasheet,
                  qsguide
                FROM fichas_tecnicas
                WHERE refCat = '$refCat';";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return null;
        }
    }

    /**
    * Obtiene los numeros de parte solicitados para un producto
    * @param string refCat
    * @return array
    */

    function showNPartes($refCat) {
        $sql = "SELECT NParte
                FROM npartes
                Where refCat = '$refCat'";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }


    /************************************************************
    *
    * Seccion de consultas del catalogo de etiquetas
    *
    *************************************************************/



    /**
    * Obtiene los primero 10 productos de la tabla catalogo_eti
    * @return array
    */

    function showMainListEti() {
        $sql = "SELECT Nproducto
                ,    descripcion_publica
                ,    img_dir 
                FROM catalogo_eti LIMIT 10";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    /**
    * Obtiene los primero 10 productos de la tabla catalogo_eti
    * @param limit
    * @return arra
    */

    function showMainListEtiLimit($limit) {
        $sql = "SELECT Nproducto
                ,    descripcion_publica
                ,    img_dir 
                FROM catalogo_eti LIMIT $limit";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }


    /************************************************************
    *
    * Seccion de consultas del catalogo de terminales
    *
    *************************************************************/



    /**
    * Obtiene los primero 10 productos de la tabla catalogo_ter
    * @return array
    */

    function showMainListTer() {
        $sql = "SELECT refCat
                ,    descripcion_publica
                ,    img_dir 
                FROM catalogo_ter
                Where activo = 1
                order by sortOrder
                LIMIT 10";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }


    /**
    * Obtiene los primero n productos solicitados de la tabla catalogo_t
    * @param lim
    * @return arr
    */

    function showMainListTerLimit($limit) {
        $sql = "SELECT refCat
                ,    descripcion_publica
                ,    img_dir 
                FROM catalogo_ter
                Where activo = 1
                order by sortOrder
                LIMIT $limit";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }


    /************************************************************
    *
    * Seccion de consultas del catalogo de Impresoras
    *
    *************************************************************/


    /*
    * Obtiene los primero 10 productos de la tabla catalogo_impr
    * @return arra
    */

    function showMainListImpre() {
        $sql = "SELECT refCat
                ,    descripcion_publica
                ,    img_dir 
                FROM catalogo_impre
                Where activo = 1
                order by sortOrder
                LIMIT 10";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }



    /**
    * Obtiene los primero n productos solicitados de la tabla catalogo_impre
    * @param limit
    * @return array
    */

    function showMainListImpreLimit($limit) {
     $sql = "SELECT refCat
                ,    descripcion_publica
                ,    img_dir 
                FROM catalogo_impre
                Where activo = 1
                order by sortOrder
                LIMIT $limit";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    /************************************************************
    *
    * Seccion de consultas del catalogo de Software
    *
    *************************************************************/


    /*
    * Obtiene los primero 10 productos de la tabla catalogo_soft
    * @return arra
    */

    function showMainListSoft() {
        $sql = "SELECT refCat
                ,    descripcion_publica
                ,    img_dir 
                FROM catalogo_soft
                Where activo = 1
                order by sortOrder
                LIMIT 10";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }



    /**
    * Obtiene los primero n productos solicitados de la tabla catalogo_soft
    * @param limit
    * @return array
    */

    function showMainListSoftLimit($limit) {
     $sql = "SELECT refCat
                ,    descripcion_publica
                ,    img_dir 
                FROM catalogo_soft
                Where activo = 1
                order by sortOrder
                LIMIT $limit";
        $query = $this->db->query($sql);    
        return $query->result_array();
    }
    
//==========================================================================================
//==========================================================================================
    
    function topGeneral() {
             $sql = "SELECT 
            pt.NProducto,
            pt.Producto AS Producto, 
            pt.Descripcion AS  Descripcion,
            p.UrlImg AS UrlImg
            FROM productostop pt
            INNER JOIN productos p
            ON p.NProducto = pt.NProducto
            GROUP BY pt.NProducto
            ORDER BY pt.NProducto";   

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    public function topEti() {
     $sql = "SELECT p.NProducto AS Producto, 
            p.Descripcion AS Descripcion, 
            COUNT(p.NProducto) AS Total
            FROM productos p
            WHERE p.NProducto LIKE '%ETI%' AND YEAR(p.Fecha_Actual_Existencia) > 2018 
            GROUP BY p.NProducto
            ORDER BY COUNT(p.Nproducto) DESC LIMIT 10";

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    function topImp() {
     $sql = "SELECT p.NProducto AS Producto, 
            p.Descripcion AS Descripcion, 
            COUNT(p.NProducto) AS Total
            FROM productos p
            WHERE p.NProducto LIKE '%IMP%' AND YEAR(p.Fecha_Actual_Existencia) > 2018 
            GROUP BY p.NProducto
            ORDER BY COUNT(p.Nproducto) DESC LIMIT 10";

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    function topRib() {
     $sql = "SELECT p.NProducto AS Producto, 
            p.Descripcion AS Descripcion, 
            COUNT(p.NProducto) AS Total
            FROM productos p
            WHERE p.NProducto LIKE '%RIB%' AND YEAR(p.Fecha_Actual_Existencia) > 2018 
            GROUP BY p.NProducto
            ORDER BY COUNT(p.Nproducto) DESC LIMIT 10";

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    function topTer() {
     $sql = "SELECT p.NProducto AS Producto, 
            p.Descripcion AS Descripcion, 
            COUNT(p.NProducto) AS Total
            FROM productos p
            WHERE p.NProducto LIKE '%TER%' AND YEAR(p.Fecha_Actual_Existencia) > 2018 
            GROUP BY p.NProducto
            ORDER BY COUNT(p.Nproducto) DESC LIMIT 10";

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    function detalleProducto($data){
     $sql = "SELECT fd.Nproducto AS Producto, p.Producto AS Descripcion FROM facturas_detalle fd
            INNER JOIN productos p ON p.NProducto = fd.Nproducto
            WHERE p.NProducto = '$data'
            GROUP BY p.NProducto";

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    function getProductsByUnits($value){
        $sql = "SELECT 
            p.NProducto,
            pt.Producto AS Producto, 
            pt.Descripcion AS  Descripcion,
            p.UrlImg AS Imagen
            FROM productostop pt
            INNER JOIN productos p
            ON p.NProducto = pt.NProducto
            WHERE p.NProducto IN ($value)
            GROUP BY pt.NProducto
            ORDER BY pt.NProducto";

        $query = $this->db->query($sql);   
        return $query->result_array();
    }

    function searchList($segment){
        $segment = str_replace(' ', '', $segment);
        $sql = "SELECT p.NProducto,
            p.Producto AS Producto, 
            p.Descripcion AS Descripcion, 
            COUNT(p.NProducto) AS Total,
            p.UrlImg AS UrlImg
            FROM productos p
            WHERE REPLACE(CONCAT(p.Producto, p.Descripcion),' ','') 
            LIKE '%$segment%'
            AND YEAR(p.Fecha_Actual_Existencia) > 2018 
            GROUP BY p.NProducto
            ORDER BY p.Nproducto";   

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function productosGenerales($value) {
        $sql = "SELECT p.NProducto,
            p.Producto AS Producto, 
            p.Descripcion AS Descripcion, 
            p.UrlImg AS UrlImg
            FROM productos p
            WHERE p.NProducto LIKE '%$value%'
            GROUP BY p.NProducto";

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    function produDetalle($value) {
        $sql = "SELECT 
            p.NProducto AS NProducto,
            p.Producto AS Producto, 
            p.Descripcion AS Descripcion,
            p.UrlImg AS UrlImg,
            pm.Parametros AS Parametro,
            pm.Valor AS Valor
            FROM productos p
            INNER JOIN productos_param pm 
            ON pm.NProducto = p.NProducto
            WHERE p.NProducto LIKE '$value'
            GROUP BY p.NProducto";

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    function produParam($value) {
        $sql = "SELECT 
            p.NProducto AS NProducto,
            pm.Parametros AS Parametro,
            TRIM(pm.Valor) AS Valor
            FROM productos p
            INNER JOIN productos_param pm 
            ON pm.NProducto = p.NProducto
            WHERE p.NProducto LIKE '$value' 
            AND LENGTH(pm.Valor) > 0";

        $query = $this->db->query($sql);    
        return $query->result_array();
    }

    function dinamicBox($value) {
        $sql = "SELECT DISTINCT
            par.Parametros
            FROM productos_param par
            WHERE par.NProducto LIKE '%$value%'"; 

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function dinamicBoxValues($value) {
        $sql = "SELECT DISTINCT
            par.Valor
            FROM productos_param par
            WHERE par.Parametros LIKE '%$value%'"; 

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getValuesByParam($value) {
        $sql = "SELECT DISTINCT
            par.Valor
            FROM productos_param par
            WHERE par.Parametros LIKE '%$value%'
            AND LENGTH(par.Valor) > 0
            ORDER BY cast(par.Valor as unsigned), par.Valor"; 

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getValuesByValues($value) {
        $sql = "SELECT 
            p.NProducto AS NProducto,
            p.Producto AS Producto, 
            p.Descripcion AS Descripcion,
            p.UrlImg AS UrlImg,
            pm.Parametros AS Parametro,
            pm.Valor AS Valor
            FROM productos p
            INNER JOIN productos_param pm 
            ON pm.NProducto = p.NProducto
            WHERE pm.Valor = '$value'
            GROUP BY p.NProducto";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getValuesByFilters($filters, $group){
        $columsString = "";
        $whereString = "";
       // $p = "";
       // $v = "";
       // if($p == true AND $v == true){
        foreach ($filters as $key => $filter){ 
            $p = $key;
            $v = $filter;
            $whereString .= "T0.$p IN($v) AND " ;
            $columsString.= "MAX(IF (p.Parametros ='$p',p.Valor,NULL)) AS $p," ;
        }
        
        $whereString .= "1=1";
        $columsString .= "1 AS Status";

        $sql = "SELECT DISTINCT p.NProducto,
            p.Producto AS Producto, 
            p.Descripcion AS Descripcion, 
            p.UrlImg AS UrlImg FROM(
            SELECT p.NProducto, $columsString
            FROM `productos_param` p
            GROUP BY p.NProducto
            ) AS T0 
            INNER JOIN productos p ON p.NProducto = T0.NProducto
            WHERE $whereString AND p.NProducto LIKE '%$group%'";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
?>
