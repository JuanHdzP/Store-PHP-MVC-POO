<?php
class Producto
{
    protected $id;
    protected $categoria_id;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    protected $stock;
    protected $oferta;
    protected $fecha;
    protected $imagen;
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): self
    {
        $this->id = $this->db->real_escape_string($id);

        return $this;
    }
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }
    public function setCategoriaId($categoria_id): self
    {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre): self
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio): self
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function setStock($stock): self
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }
    public function getOferta()
    {
        return $this->oferta;
    }
    public function setOferta($oferta): self
    {
        $this->oferta = $this->db->real_escape_string($oferta);

        return $this;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
        return $productos;
    }
    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()};");
        return $producto->fetch_object();
    }

    public function save()
    {
        $sql = "INSERT INTO productos(categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen)
        VALUES('{$this->getCategoriaId()}', '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', 
        {$this->getStock()}, NULL, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    public function edit()
    {
        $sql = "UPDATE productos SET categoria_id='{$this->getCategoriaId()}', nombre='{$this->getNombre()}', 
        descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}";
        // Modificar consulta en caso de que se quiera modificar la img o no        
        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";
        }
        $sql .= " WHERE id={$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id={$this->id};";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function getRandom($limit)
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit;");
        return $productos;
    }
    public function getByCategoria()
    {
        $sql = "SELECT p.*, c.nombre AS nombre_cat FROM productos p "
            . "INNER JOIN categorias c ON c.id=p.categoria_id "
            . "WHERE p.categoria_id = {$this->getCategoriaId()} "
            . "ORDER BY id DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }
}
