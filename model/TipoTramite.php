<?php
namespace Stel\Model;


class TipoTramite extends Entity{
	private $idTipoTramite;
	private $nombre;
	private $diasvalidez;
	private $codigonombre;

	public function getIdField(){
		return "idTipoTramite";
	}

	public function setIdTipoTramite($id){
		$this->idTipoTramite = $id;
	}

	public function getIdTipoTramite(){
		return $this->idTipoTramite;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDiasvalidez(){
		return $this->diasvalidez;
	}

	public function setDiasvalidez($diasvalidez){
		$this->diasvalidez = $diasvalidez;
	}

	public function jsonSerialize(){
		return array(
				"idTipoTramite"=>$this->idTipoTramite,
				"nombre"=>$this->nombre,
				"diasvalidez"=>$this->diasvalidez,
			);
	}

    /**
     * Gets the value of codigonombre.
     *
     * @return mixed
     */
    public function getCodigonombre()
    {
        return $this->codigonombre;
    }
    
    /**
     * Sets the value of codigonombre.
     *
     * @param mixed $codigonombre the codigonombre
     *
     * @return self
     */
    public function setCodigonombre($codigonombre)
    {
        $this->codigonombre = $codigonombre;

        return $this;
    }
}