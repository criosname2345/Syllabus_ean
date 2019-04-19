<?php

namespace ean\cc;

class Perfil extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idPerfil;

    /**
     *
     * @var string
     */
    protected $nombre;

    /**
     * Method to set the value of field idPerfil
     *
     * @param integer $idPerfil
     * @return $this
     */
    public function setIdPerfil($idPerfil)
    {
        $this->idPerfil = $idPerfil;

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
     * Returns the value of field idPerfil
     *
     * @return integer
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("perfil");
        $this->hasMany('idPerfil', 'ean\cc\CompPerfil', 'idPerfil', ['alias' => 'CompPerfil']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'perfil';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Perfil[]|Perfil|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Perfil|\Phalcon\Mvc\Model\ResultInterface
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
            'idPerfil' => 'idPerfil',
            'nombre' => 'nombre'
        ];
    }

}
