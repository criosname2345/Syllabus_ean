<?php

namespace ean\cc;

class Detallesyllabus extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idDetalle;

    /**
     *
     * @var string
     */
    protected $creacion;

    /**
     *
     * @var string
     */
    protected $modalidad;

    /**
     *
     * @var string
     */
    protected $duracion;

    /**
     *
     * @var string
     */
    protected $proposito;

    /**
     *
     * @var string
     */
    protected $metodologia;

    /**
     *
     * @var string
     */
    protected $resumenContenidos;

    /**
     *
     * @var string
     */
    protected $evaluacion;

    /**
     *
     * @var string
     */
    protected $bibliografia;

    /**
     *
     * @var string
     */
    protected $enlacesWeb;

    /**
     *
     * @var string
     */
    protected $lengua;

    /**
     *
     * @var string
     */
    protected $prLengua;

    /**
     *
     * @var string
     */
    protected $obsVersion;

    /**
     *
     * @var integer
     */
    protected $version;

    /**
     *
     * @var integer
     */
    protected $idSyllabusCab;

    /**
     *
     * @var integer
     */
    protected $autorDetalle;

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
     * Method to set the value of field creacion
     *
     * @param string $creacion
     * @return $this
     */
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;

        return $this;
    }

    /**
     * Method to set the value of field modalidad
     *
     * @param string $modalidad
     * @return $this
     */
    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    /**
     * Method to set the value of field duracion
     *
     * @param string $duracion
     * @return $this
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Method to set the value of field proposito
     *
     * @param string $proposito
     * @return $this
     */
    public function setProposito($proposito)
    {
        $this->proposito = $proposito;

        return $this;
    }

    /**
     * Method to set the value of field metodologia
     *
     * @param string $metodologia
     * @return $this
     */
    public function setMetodologia($metodologia)
    {
        $this->metodologia = $metodologia;

        return $this;
    }

    /**
     * Method to set the value of field resumenContenidos
     *
     * @param string $resumenContenidos
     * @return $this
     */
    public function setResumenContenidos($resumenContenidos)
    {
        $this->resumenContenidos = $resumenContenidos;

        return $this;
    }

    /**
     * Method to set the value of field evaluacion
     *
     * @param string $evaluacion
     * @return $this
     */
    public function setEvaluacion($evaluacion)
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    /**
     * Method to set the value of field bibliografia
     *
     * @param string $bibliografia
     * @return $this
     */
    public function setBibliografia($bibliografia)
    {
        $this->bibliografia = $bibliografia;

        return $this;
    }

    /**
     * Method to set the value of field enlacesWeb
     *
     * @param string $enlacesWeb
     * @return $this
     */
    public function setEnlacesWeb($enlacesWeb)
    {
        $this->enlacesWeb = $enlacesWeb;

        return $this;
    }

    /**
     * Method to set the value of field lengua
     *
     * @param string $lengua
     * @return $this
     */
    public function setLengua($lengua)
    {
        $this->lengua = $lengua;

        return $this;
    }

    /**
     * Method to set the value of field prLengua
     *
     * @param string $prLengua
     * @return $this
     */
    public function setPrLengua($prLengua)
    {
        $this->prLengua = $prLengua;

        return $this;
    }

    /**
     * Method to set the value of field obsVersion
     *
     * @param string $obsVersion
     * @return $this
     */
    public function setObsVersion($obsVersion)
    {
        $this->obsVersion = $obsVersion;

        return $this;
    }

    /**
     * Method to set the value of field version
     *
     * @param integer $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

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
     * Method to set the value of field autorDetalle
     *
     * @param integer $autorDetalle
     * @return $this
     */
    public function setAutorDetalle($autorDetalle)
    {
        $this->autorDetalle = $autorDetalle;

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
     * Returns the value of field creacion
     *
     * @return string
     */
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * Returns the value of field modalidad
     *
     * @return string
     */
    public function getModalidad()
    {
        return $this->modalidad;
    }

    /**
     * Returns the value of field duracion
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Returns the value of field proposito
     *
     * @return string
     */
    public function getProposito()
    {
        return $this->proposito;
    }

    /**
     * Returns the value of field metodologia
     *
     * @return string
     */
    public function getMetodologia()
    {
        return $this->metodologia;
    }

    /**
     * Returns the value of field resumenContenidos
     *
     * @return string
     */
    public function getResumenContenidos()
    {
        return $this->resumenContenidos;
    }

    /**
     * Returns the value of field evaluacion
     *
     * @return string
     */
    public function getEvaluacion()
    {
        return $this->evaluacion;
    }

    /**
     * Returns the value of field bibliografia
     *
     * @return string
     */
    public function getBibliografia()
    {
        return $this->bibliografia;
    }

    /**
     * Returns the value of field enlacesWeb
     *
     * @return string
     */
    public function getEnlacesWeb()
    {
        return $this->enlacesWeb;
    }

    /**
     * Returns the value of field lengua
     *
     * @return string
     */
    public function getLengua()
    {
        return $this->lengua;
    }

    /**
     * Returns the value of field prLengua
     *
     * @return string
     */
    public function getPrLengua()
    {
        return $this->prLengua;
    }

    /**
     * Returns the value of field obsVersion
     *
     * @return string
     */
    public function getObsVersion()
    {
        return $this->obsVersion;
    }

    /**
     * Returns the value of field version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
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
     * Returns the value of field autorDetalle
     *
     * @return integer
     */
    public function getAutorDetalle()
    {
        return $this->autorDetalle;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("detallesyllabus");
        $this->hasMany('idDetalle', 'ean\cc\DetalleSesion', 'idDetalle', ['alias' => 'DetalleSesion']);
        $this->hasMany('idDetalle', 'ean\cc\Syllabuscab', 'versionActual', ['alias' => 'Syllabuscab']);
        $this->belongsTo('idSyllabusCab', 'ean\cc\Syllabuscab', 'idSyllabusCab', ['alias' => 'Syllabuscab']);
        $this->belongsTo('autorDetalle', 'ean\cc\Usuario', 'idUsuario', ['alias' => 'Usuario']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'detallesyllabus';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Detallesyllabus[]|Detallesyllabus|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Detallesyllabus|\Phalcon\Mvc\Model\ResultInterface
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
            'creacion' => 'creacion',
            'modalidad' => 'modalidad',
            'duracion' => 'duracion',
            'proposito' => 'proposito',
            'metodologia' => 'metodologia',
            'resumenContenidos' => 'resumenContenidos',
            'evaluacion' => 'evaluacion',
            'bibliografia' => 'bibliografia',
            'enlacesWeb' => 'enlacesWeb',
            'lengua' => 'lengua',
            'prLengua' => 'prLengua',
            'obsVersion' => 'obsVersion',
            'version' => 'version',
            'idSyllabusCab' => 'idSyllabusCab',
            'autorDetalle' => 'autorDetalle'
        ];
    }

}
