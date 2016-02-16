<?php
namespace Stel\Model;


class Usuario extends Entity{
	private $idUsuario;
	private $usuario;
	private $password;
	private $email;
	private $idDireccion;
	private $activo;
    private $telefono;

    /**
     * Gets the value of idUsuario.
     *
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
    /**
     * Sets the value of idUsuario.
     *
     * @param mixed $idUsuario the id usuario
     *
     * @return self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Gets the value of usuario.
     *
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    /**
     * Sets the value of usuario.
     *
     * @param mixed $usuario the usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of telefono.
     *
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
    
    /**
     * Sets the value of telefono.
     *
     * @param mixed $telefono the telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Gets the value of idDireccion.
     *
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->idDireccion;
    }
    
    /**
     * Sets the value of idDireccion.
     *
     * @param mixed $idDireccion the id direccion
     *
     * @return self
     */
    public function setIdDireccion($idDireccion)
    {
        $this->idDireccion = $idDireccion;

        return $this;
    }

    /**
     * Gets the value of activo.
     *
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }
    
    /**
     * Sets the value of activo.
     *
     * @param mixed $activo the activo
     *
     * @return self
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

	public function jsonSerialize(){
		return array(
				"idUsuario"=>$this->idUsuario,
				"usuario"=>$this->usuario,
                "password"=>$this->password,
                "email"=>$this->email,
                "telefono"=>$this->telefono,
                "activo"=>$this->activo,
                "idDireccion"=>$this->idDireccion,
			);
	}

	public static function encode($password){
		return md5($password);
	}

	public static function getSessionUser(){
		//var_dump($_SESSION["user"]);die;
		if(isset($_SESSION["user"]))
			return $_SESSION["user"];
		return false;
	}
}