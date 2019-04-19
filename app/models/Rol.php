<?php

namespace ean\cc;

class Rol extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idRol;

    /**
     *
     * @var string
     */
    protected $nombreRol;

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
     * Method to set the value of field nombreRol
     *
     * @param string $nombreRol
     * @return $this
     */
    public function setNombreRol($nombreRol)
    {
        $this->nombreRol = $nombreRol;

        return $this;
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
     * Returns the value of field nombreRol
     *
     * @return string
     */
    public function getNombreRol()
    {
        return $this->nombreRol;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("rol");
        $this->hasMany('idRol', 'ean\cc\Permiso', 'idRol', ['alias' => 'Permiso']);
        $this->hasMany('idRol', 'ean\cc\Usuario', 'idRol', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'rol';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Rol[]|Rol|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Rol|\Phalcon\Mvc\Model\ResultInterface
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
            'idRol' => 'idRol',
            'nombreRol' => 'nombreRol'
        ];
    }

}
