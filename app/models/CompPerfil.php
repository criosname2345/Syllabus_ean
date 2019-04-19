<?php

namespace ean\cc;

class CompPerfil extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idCompetencia;

    /**
     *
     * @var integer
     */
    protected $idPerfil;

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
     * Returns the value of field idCompetencia
     *
     * @return integer
     */
    public function getIdCompetencia()
    {
        return $this->idCompetencia;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("comp_perfil");
        $this->belongsTo('idCompetencia', 'ean\cc\Competencia', 'idCompetencia', ['alias' => 'Competencia']);
        $this->belongsTo('idPerfil', 'ean\cc\Perfil', 'idPerfil', ['alias' => 'Perfil']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'comp_perfil';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompPerfil[]|CompPerfil|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompPerfil|\Phalcon\Mvc\Model\ResultInterface
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
            'idPerfil' => 'idPerfil'
        ];
    }

}
