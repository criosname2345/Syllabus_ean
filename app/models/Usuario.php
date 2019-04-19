<?php

namespace ean\cc;

class Usuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idUsuario;

    /**
     *
     * @var string
     */
    protected $nombre;

    /**
     *
     * @var string
     */
    protected $apellido;

    /**
     *
     * @var string
     */
    protected $correo;

    /**
     *
     * @var string
     */
    protected $telefono;

    /**
     *
     * @var string
     */
    protected $celular;

    /**
     *
     * @var string
     */
    protected $cedula;

    /**
     *
     * @var integer
     */
    protected $idJerarquia;

    /**
     *
     * @var integer
     */
    protected $idRol;

    /**
     *
     * @var string
     */
    protected $idSesionAut;

    /**
     * Method to set the value of field idUsuario
     *
     * @param integer $idUsuario
     * @return $this
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Method to set the value of field nombre
     *
     * @param string $nombre
     * @return $this
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Method to set the value of field apellido
     *
     * @param string $apellido
     * @return $this
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Method to set the value of field correo
     *
     * @param string $correo
     * @return $this
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Method to set the value of field telefono
     *
     * @param string $telefono
     * @return $this
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Method to set the value of field celular
     *
     * @param string $celular
     * @return $this
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Method to set the value of field cedula
     *
     * @param string $cedula
     * @return $this
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Method to set the value of field idJerarquia
     *
     * @param integer $idJerarquia
     * @return $this
     */
    public function setIdJerarquia($idJerarquia)
    {
        $this->idJerarquia = $idJerarquia;

        return $this;
    }

    /**
     * Method to set the value of field idRol
     *
     * @param integer $idRol
     * @return $this
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Method to set the value of field idSesionAut
     *
     * @param string $idSesionAut
     * @return $this
     */
    public function setIdSesionAut($idSesionAut)
    {
        $this->idSesionAut = $idSesionAut;

        return $this;
    }

    /**
     * Returns the value of field idUsuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Returns the value of field apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Returns the value of field correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Returns the value of field telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Returns the value of field celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Returns the value of field cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Returns the value of field idJerarquia
     *
     * @return integer
     */
    public function getIdJerarquia()
    {
        return $this->idJerarquia;
    }

    /**
     * Returns the value of field idRol
     *
     * @return integer
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Returns the value of field idSesionAut
     *
     * @return string
     */
    public function getIdSesionAut()
    {
        return $this->idSesionAut;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("usuario");
        $this->hasMany('idUsuario', 'ean\cc\Detallesyllabus', 'autorDetalle', ['alias' => 'Detallesyllabus']);
        $this->hasMany('idUsuario', 'ean\cc\Syllabuscab', 'aprobo', ['alias' => 'Syllabuscab']);
        $this->hasMany('idUsuario', 'ean\cc\Syllabuscab', 'autorCreacion', ['alias' => 'Syllabuscab']);
        $this->hasMany('idUsuario', 'ean\cc\Syllabuscab', 'reviso', ['alias' => 'Syllabuscab']);
        $this->belongsTo('idJerarquia', 'ean\cc\Jerarquia', 'idJerarquia', ['alias' => 'Jerarquia']);
        $this->belongsTo('idRol', 'ean\cc\Rol', 'idRol', ['alias' => 'Rol']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario[]|Usuario|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'idUsuario' => 'idUsuario',
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'correo' => 'correo',
            'telefono' => 'telefono',
            'celular' => 'celular',
            'cedula' => 'cedula',
            'idJerarquia' => 'idJerarquia',
            'idRol' => 'idRol',
            'idSesionAut' => 'idSesionAut'
        ];
    }

}
