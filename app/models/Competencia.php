<?php

namespace ean\cc;

class Competencia extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idCompetencia;

    /**
     *
     * @var string
     */
    protected $tipo;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     *
     * @var string
     */
    protected $emprendimiento;

    /**
     *
     * @var string
     */
    protected $sostenibilidad;

    /**
     *
     * @var string
     */
    protected $innovacion;

    /**
     *
     * @var string
     */
    protected $lineaTematica;

    /**
     *
     * @var string
     */
    protected $conocer;

    /**
     *
     * @var string
     */
    protected $comprender;

    /**
     *
     * @var string
     */
    protected $analizar;

    /**
     *
     * @var string
     */
    protected $aplicar;

    /**
     *
     * @var string
     */
    protected $sintetizar;

    /**
     *
     * @var string
     */
    protected $evaluar;

    /**
     * Method to set the value of field idCompetencia
     *
     * @param integer $idCompetencia
     * @return $this
     */
    public function setIdCompetencia($idCompetencia)
    {
        $this->idCompetencia = $idCompetencia;

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
     * Method to set the value of field descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Method to set the value of field emprendimiento
     *
     * @param string $emprendimiento
     * @return $this
     */
    public function setEmprendimiento($emprendimiento)
    {
        $this->emprendimiento = $emprendimiento;

        return $this;
    }

    /**
     * Method to set the value of field sostenibilidad
     *
     * @param string $sostenibilidad
     * @return $this
     */
    public function setSostenibilidad($sostenibilidad)
    {
        $this->sostenibilidad = $sostenibilidad;

        return $this;
    }

    /**
     * Method to set the value of field innovacion
     *
     * @param string $innovacion
     * @return $this
     */
    public function setInnovacion($innovacion)
    {
        $this->innovacion = $innovacion;

        return $this;
    }

    /**
     * Method to set the value of field lineaTematica
     *
     * @param string $lineaTematica
     * @return $this
     */
    public function setLineaTematica($lineaTematica)
    {
        $this->lineaTematica = $lineaTematica;

        return $this;
    }

    /**
     * Method to set the value of field conocer
     *
     * @param string $conocer
     * @return $this
     */
    public function setConocer($conocer)
    {
        $this->conocer = $conocer;

        return $this;
    }

    /**
     * Method to set the value of field comprender
     *
     * @param string $comprender
     * @return $this
     */
    public function setComprender($comprender)
    {
        $this->comprender = $comprender;

        return $this;
    }

    /**
     * Method to set the value of field analizar
     *
     * @param string $analizar
     * @return $this
     */
    public function setAnalizar($analizar)
    {
        $this->analizar = $analizar;

        return $this;
    }

    /**
     * Method to set the value of field aplicar
     *
     * @param string $aplicar
     * @return $this
     */
    public function setAplicar($aplicar)
    {
        $this->aplicar = $aplicar;

        return $this;
    }

    /**
     * Method to set the value of field sintetizar
     *
     * @param string $sintetizar
     * @return $this
     */
    public function setSintetizar($sintetizar)
    {
        $this->sintetizar = $sintetizar;

        return $this;
    }

    /**
     * Method to set the value of field evaluar
     *
     * @param string $evaluar
     * @return $this
     */
    public function setEvaluar($evaluar)
    {
        $this->evaluar = $evaluar;

        return $this;
    }

    /**
     * Returns the value of field idCompetencia
     *
     * @return integer
     */
    public function getIdCompetencia()
    {
        return $this->idCompetencia;
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
     * Returns the value of field descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Returns the value of field emprendimiento
     *
     * @return string
     */
    public function getEmprendimiento()
    {
        return $this->emprendimiento;
    }

    /**
     * Returns the value of field sostenibilidad
     *
     * @return string
     */
    public function getSostenibilidad()
    {
        return $this->sostenibilidad;
    }

    /**
     * Returns the value of field innovacion
     *
     * @return string
     */
    public function getInnovacion()
    {
        return $this->innovacion;
    }

    /**
     * Returns the value of field lineaTematica
     *
     * @return string
     */
    public function getLineaTematica()
    {
        return $this->lineaTematica;
    }

    /**
     * Returns the value of field conocer
     *
     * @return string
     */
    public function getConocer()
    {
        return $this->conocer;
    }

    /**
     * Returns the value of field comprender
     *
     * @return string
     */
    public function getComprender()
    {
        return $this->comprender;
    }

    /**
     * Returns the value of field analizar
     *
     * @return string
     */
    public function getAnalizar()
    {
        return $this->analizar;
    }

    /**
     * Returns the value of field aplicar
     *
     * @return string
     */
    public function getAplicar()
    {
        return $this->aplicar;
    }

    /**
     * Returns the value of field sintetizar
     *
     * @return string
     */
    public function getSintetizar()
    {
        return $this->sintetizar;
    }

    /**
     * Returns the value of field evaluar
     *
     * @return string
     */
    public function getEvaluar()
    {
        return $this->evaluar;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("competencia");
        $this->hasMany('idCompetencia', 'ean\cc\Alcance', 'idCompetencia', ['alias' => 'Alcance']);
        $this->hasMany('idCompetencia', 'ean\cc\CompPerfil', 'idCompetencia', ['alias' => 'CompPerfil']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'competencia';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Competencia[]|Competencia|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Competencia|\Phalcon\Mvc\Model\ResultInterface
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
            'idCompetencia' => 'idCompetencia',
            'tipo' => 'tipo',
            'descripcion' => 'descripcion',
            'emprendimiento' => 'emprendimiento',
            'sostenibilidad' => 'sostenibilidad',
            'innovacion' => 'innovacion',
            'lineaTematica' => 'lineaTematica',
            'conocer' => 'conocer',
            'comprender' => 'comprender',
            'analizar' => 'analizar',
            'aplicar' => 'aplicar',
            'sintetizar' => 'sintetizar',
            'evaluar' => 'evaluar'
        ];
    }

}
