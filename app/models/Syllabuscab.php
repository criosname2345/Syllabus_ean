<?php

namespace ean\cc;

class Syllabuscab extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idSyllabusCab;

    /**
     *
     * @var string
     */
    protected $fecCreacion;

    /**
     *
     * @var string
     */
    protected $codigo;

    /**
     *
     * @var string
     */
    protected $observacion;

    /**
     *
     * @var string
     */
    protected $status;

    /**
     *
     * @var integer
     */
    protected $versionActual;

    /**
     *
     * @var integer
     */
    protected $reviso;

    /**
     *
     * @var integer
     */
    protected $aprobo;

    /**
     *
     * @var integer
     */
    protected $autorCreacion;

    /**
     *
     * @var integer
     */
    protected $idUnidad;

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
     * Method to set the value of field fecCreacion
     *
     * @param string $fecCreacion
     * @return $this
     */
    public function setFecCreacion($fecCreacion)
    {
        $this->fecCreacion = $fecCreacion;

        return $this;
    }

    /**
     * Method to set the value of field codigo
     *
     * @param string $codigo
     * @return $this
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Method to set the value of field observacion
     *
     * @param string $observacion
     * @return $this
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field versionActual
     *
     * @param integer $versionActual
     * @return $this
     */
    public function setVersionActual($versionActual)
    {
        $this->versionActual = $versionActual;

        return $this;
    }

    /**
     * Method to set the value of field reviso
     *
     * @param integer $reviso
     * @return $this
     */
    public function setReviso($reviso)
    {
        $this->reviso = $reviso;

        return $this;
    }

    /**
     * Method to set the value of field aprobo
     *
     * @param integer $aprobo
     * @return $this
     */
    public function setAprobo($aprobo)
    {
        $this->aprobo = $aprobo;

        return $this;
    }

    /**
     * Method to set the value of field autorCreacion
     *
     * @param integer $autorCreacion
     * @return $this
     */
    public function setAutorCreacion($autorCreacion)
    {
        $this->autorCreacion = $autorCreacion;

        return $this;
    }

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
     * Returns the value of field idSyllabusCab
     *
     * @return integer
     */
    public function getIdSyllabusCab()
    {
        return $this->idSyllabusCab;
    }

    /**
     * Returns the value of field fecCreacion
     *
     * @return string
     */
    public function getFecCreacion()
    {
        return $this->fecCreacion;
    }

    /**
     * Returns the value of field codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Returns the value of field observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field versionActual
     *
     * @return integer
     */
    public function getVersionActual()
    {
        return $this->versionActual;
    }

    /**
     * Returns the value of field reviso
     *
     * @return integer
     */
    public function getReviso()
    {
        return $this->reviso;
    }

    /**
     * Returns the value of field aprobo
     *
     * @return integer
     */
    public function getAprobo()
    {
        return $this->aprobo;
    }

    /**
     * Returns the value of field autorCreacion
     *
     * @return integer
     */
    public function getAutorCreacion()
    {
        return $this->autorCreacion;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("syllabuscab");
        $this->hasMany('idSyllabusCab', 'ean\cc\Detallesyllabus', 'idSyllabusCab', ['alias' => 'Detallesyllabus']);
        $this->hasMany('idSyllabusCab', 'ean\cc\Unidad', 'idSyllabusCab', ['alias' => 'Unidad']);
        $this->belongsTo('versionActual', 'ean\cc\Detallesyllabus', 'idDetalle', ['alias' => 'Detallesyllabus']);
        $this->belongsTo('idUnidad', 'ean\cc\Unidad', 'idUnidad', ['alias' => 'Unidad']);
        $this->belongsTo('aprobo', 'ean\cc\Usuario', 'idUsuario', ['alias' => 'Usuario']);
        $this->belongsTo('autorCreacion', 'ean\cc\Usuario', 'idUsuario', ['alias' => 'Usuario']);
        $this->belongsTo('reviso', 'ean\cc\Usuario', 'idUsuario', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'syllabuscab';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Syllabuscab[]|Syllabuscab|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Syllabuscab|\Phalcon\Mvc\Model\ResultInterface
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
            'idSyllabusCab' => 'idSyllabusCab',
            'fecCreacion' => 'fecCreacion',
            'codigo' => 'codigo',
            'observacion' => 'observacion',
            'status' => 'status',
            'versionActual' => 'versionActual',
            'reviso' => 'reviso',
            'aprobo' => 'aprobo',
            'autorCreacion' => 'autorCreacion',
            'idUnidad' => 'idUnidad'
        ];
    }

}
