<?php

namespace ean\cc;

class Unidad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idUnidad;

    /**
     *
     * @var string
     */
    protected $nombre;

    /**
     *
     * @var string
     */
    protected $justificacion;

    /**
     *
     * @var string
     */
    protected $tipo;

    /**
     *
     * @var integer
     */
    protected $creditos;

    /**
     *
     * @var integer
     */
    protected $nivel;

    /**
     *
     * @var string
     */
    protected $codigosSap;

    /**
     *
     * @var integer
     */
    protected $idJerarquia;

    /**
     *
     * @var integer
     */
    protected $idSyllabusCab;

    /**
     * Method to set the value of field idUnidad
     *
     * @param integer $idUnidad
     * @return $this
     */
    public function setIdUnidad($idUnidad)
    {
        $this->idUnidad = $idUnidad;

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
     * Method to set the value of field justificacion
     *
     * @param string $justificacion
     * @return $this
     */
    public function setJustificacion($justificacion)
    {
        $this->justificacion = $justificacion;

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
     * Method to set the value of field creditos
     *
     * @param integer $creditos
     * @return $this
     */
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;

        return $this;
    }

    /**
     * Method to set the value of field nivel
     *
     * @param integer $nivel
     * @return $this
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Method to set the value of field codigosSap
     *
     * @param string $codigosSap
     * @return $this
     */
    public function setCodigosSap($codigosSap)
    {
        $this->codigosSap = $codigosSap;

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
     * Method to set the value of field idSyllabusCab
     *
     * @param integer $idSyllabusCab
     * @return $this
     */
    public function setIdSyllabusCab($idSyllabusCab)
    {
        $this->idSyllabusCab = $idSyllabusCab;

        return $this;
    }

    /**
     * Returns the value of field idUnidad
     *
     * @return integer
     */
    public function getIdUnidad()
    {
        return $this->idUnidad;
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
     * Returns the value of field justificacion
     *
     * @return string
     */
    public function getJustificacion()
    {
        return $this->justificacion;
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
     * Returns the value of field creditos
     *
     * @return integer
     */
    public function getCreditos()
    {
        return $this->creditos;
    }

    /**
     * Returns the value of field nivel
     *
     * @return integer
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Returns the value of field codigosSap
     *
     * @return string
     */
    public function getCodigosSap()
    {
        return $this->codigosSap;
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
     * Returns the value of field idSyllabusCab
     *
     * @return integer
     */
    public function getIdSyllabusCab()
    {
        return $this->idSyllabusCab;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("unidad");
        $this->hasMany('idUnidad', 'ean\cc\Syllabuscab', 'idUnidad', ['alias' => 'Syllabuscab']);
        $this->belongsTo('idJerarquia', 'ean\cc\Jerarquia', 'idJerarquia', ['alias' => 'Jerarquia']);
        $this->belongsTo('idSyllabusCab', 'ean\cc\Syllabuscab', 'idSyllabusCab', ['alias' => 'Syllabuscab']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'unidad';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Unidad[]|Unidad|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Unidad|\Phalcon\Mvc\Model\ResultInterface
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
            'idUnidad' => 'idUnidad',
            'nombre' => 'nombre',
            'justificacion' => 'justificacion',
            'tipo' => 'tipo',
            'creditos' => 'creditos',
            'nivel' => 'nivel',
            'codigosSap' => 'codigosSap',
            'idJerarquia' => 'idJerarquia',
            'idSyllabusCab' => 'idSyllabusCab'
        ];
    }

}
