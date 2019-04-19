<?php

namespace ean\cc;

class Alcance extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idJerarquia;

    /**
     *
     * @var integer
     */
    protected $idCompetencia;

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
     * Returns the value of field idJerarquia
     *
     * @return integer
     */
    public function getIdJerarquia()
    {
        return $this->idJerarquia;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("alcance");
        $this->belongsTo('idCompetencia', 'ean\cc\Competencia', 'idCompetencia', ['alias' => 'Competencia']);
        $this->belongsTo('idJerarquia', 'ean\cc\Jerarquia', 'idJerarquia', ['alias' => 'Jerarquia']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'alcance';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Alcance[]|Alcance|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Alcance|\Phalcon\Mvc\Model\ResultInterface
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
            'idCompetencia' => 'idCompetencia'
        ];
    }

}
