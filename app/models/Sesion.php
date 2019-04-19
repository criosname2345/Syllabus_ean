<?php

namespace ean\cc;

class Sesion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idSesion;

    /**
     *
     * @var string
     */
    protected $contenidos;

    /**
     *
     * @var string
     */
    protected $tAutonomo;

    /**
     *
     * @var string
     */
    protected $acompDirecto;

    /**
     *
     * @var integer
     */
    protected $numero;

    /**
     *
     * @var double
     */
    protected $duracion;

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
     * Method to set the value of field contenidos
     *
     * @param string $contenidos
     * @return $this
     */
    public function setContenidos($contenidos)
    {
        $this->contenidos = $contenidos;

        return $this;
    }

    /**
     * Method to set the value of field tAutonomo
     *
     * @param string $tAutonomo
     * @return $this
     */
    public function setTAutonomo($tAutonomo)
    {
        $this->tAutonomo = $tAutonomo;

        return $this;
    }

    /**
     * Method to set the value of field acompDirecto
     *
     * @param string $acompDirecto
     * @return $this
     */
    public function setAcompDirecto($acompDirecto)
    {
        $this->acompDirecto = $acompDirecto;

        return $this;
    }

    /**
     * Method to set the value of field numero
     *
     * @param integer $numero
     * @return $this
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Method to set the value of field duracion
     *
     * @param double $duracion
     * @return $this
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
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
     * Returns the value of field contenidos
     *
     * @return string
     */
    public function getContenidos()
    {
        return $this->contenidos;
    }

    /**
     * Returns the value of field tAutonomo
     *
     * @return string
     */
    public function getTAutonomo()
    {
        return $this->tAutonomo;
    }

    /**
     * Returns the value of field acompDirecto
     *
     * @return string
     */
    public function getAcompDirecto()
    {
        return $this->acompDirecto;
    }

    /**
     * Returns the value of field numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Returns the value of field duracion
     *
     * @return double
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("sesion");
        $this->hasMany('idSesion', 'ean\cc\DetalleSesion', 'idSesion', ['alias' => 'DetalleSesion']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sesion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sesion[]|Sesion|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Sesion|\Phalcon\Mvc\Model\ResultInterface
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
            'idSesion' => 'idSesion',
            'contenidos' => 'contenidos',
            'tAutonomo' => 'tAutonomo',
            'acompDirecto' => 'acompDirecto',
            'numero' => 'numero',
            'duracion' => 'duracion'
        ];
    }

}
