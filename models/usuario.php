<?php
class Usuario
{
    protected $id;
    protected $nombre;
    protected $apellidos;
    protected $email;
    protected $password;
    protected $rol;
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
        $this->id = $id;

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

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): self
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol): self
    {
        $this->rol = $this->db->real_escape_string($rol);

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): self
    {
        $this->imagen = $this->db->real_escape_string($imagen);

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO usuarios(nombre, apellidos, email, password, rol, imagen)
        VALUES('{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL);";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    /* public function login($email, $password) */
    public function login()
    {
        $email = $this->email;
        $password = $this->password;
        // Comprobar si existe el user
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);
        $resultado = false;
        if ($login && $login->num_rows == 1) {
            // Sacar resultado de la consulta
            $usuario = $login->fetch_object();

            // Verificar password
            $verify = password_verify($password, $usuario->password);
            if ($verify) {
                $resultado = $usuario;
            }
        }
        return $resultado;
    }
}
