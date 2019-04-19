<?php

namespace ean\cc;

class Jerarquia extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idJerarquia;

    /**
     *
     * @var string
     */
    protected $nombre;

    /**
     *
     * @var string
     */
    protected $tipo;

    /**
     *
     * @var integer
     */
    protected $jerarquiaSuperior;

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
     * Method to set the value of field tipo
     *
     * @param string $tipo
     * @return $this
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Method to set the value of field jerarquiaSuperior
     *
     * @param integer $jerarquiaSuperior
     * @return $this
     */
    public function setJerarquiaSuperior($jerarquiaSuperior)
    {
        $this->jerarquiaSuperior = $jerarquiaSuperior;

        return $this;
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
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Returns the value of field tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Returns the value of field jerarquiaSuperior
     *
     * @return integer
     */
    public function getJerarquiaSuperior()
    {
        return $this->jerarquiaSuperior;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("jerarquia");
        $this->hasMany('idJerarquia', 'ean\cc\Alcance', 'idJerarquia', ['alias' => 'Alcance']);
        $this->hasMany('idJerarquia', 'ean\cc\Jerarquia', 'jerarquiaSuperior', ['alias' => 'Jerarquia']);
        $this->hasMany('idJerarquia', 'ean\cc\Unidad', 'idJerarquia', ['alias' => 'Unidad']);
        $this->hasMany('idJerarquia', 'ean\cc\Usuario', 'idJerarquia', ['alias' => 'Usuario']);
        $this->belongsTo('jerarquiaSuperior', 'ean\cc\Jerarquia', 'idJerarquia', ['alias' => 'Jerarquia']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'jerarquia';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Jerarquia[]|Jerarquia|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Jerarquia|\Phalcon\Mvc\Model\ResultInterface
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
            'idJerarquia' => 'idJerarquia',
            'nombre' => 'nombre',
            'tipo' => 'tipo',
            'jerarquiaSuperior' => 'jerarquiaSuperior'
        ];
    }

}
