<?php

namespace ean\cc;

class DetalleSesion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idDetalle;

    /**
     *
     * @var integer
     */
    protected $idSesion;

    /**
     * Method to set the value of field idDetalle
     *
     * @param integer $idDetalle
     * @return $this
     */
    public function setIdDetalle($idDetalle)
    {
        $this->idDetalle = $idDetalle;

        return $this;
    }

    /**
     * Method to set the value of field idSesion
     *
     * @param integer $idSesion
     * @return $this
     */
    public function setIdSesion($idSesion)
    {
        $this->idSesion = $idSesion;

        return $this;
    }

    /**
     * Returns the value of field idDetalle
     *
     * @return integer
     */
    public function getIdDetalle()
    {
        return $this->idDetalle;
    }

    /**
     * Returns the value of field idSesion
     *
     * @return integer
     */
    public function getIdSesion()
    {
        return $this->idSesion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("detalle_sesion");
        $this->belongsTo('idDetalle', 'ean\cc\Detallesyllabus', 'idDetalle', ['alias' => 'Detallesyllabus']);
        $this->belongsTo('idSesion', 'ean\cc\Sesion', 'idSesion', ['alias' => 'Sesion']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detalle_sesion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetalleSesion[]|DetalleSesion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DetalleSesion|\Phalcon\Mvc\Model\ResultInterface
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
            'idDetalle' => 'idDetalle',
            'idSesion' => 'idSesion'
        ];
    }

}
