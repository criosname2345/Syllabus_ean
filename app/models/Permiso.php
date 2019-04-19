<?php

namespace ean\cc;

class Permiso extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $idPermiso;

    /**
     *
     * @var string
     */
    protected $descripcion;

    /**
     *
     * @var string
     */
    protected $visualizar;

    /**
     *
     * @var string
     */
    protected $editar;

    /**
     *
     * @var string
     */
    protected $eliminar;

    /**
     *
     * @var string
     */
    protected $crear;

    /**
     *
     * @var integer
     */
    protected $idRol;

    /**
     * Method to set the value of field idPermiso
     *
     * @param integer $idPermiso
     * @return $this
     */
    public function setIdPermiso($idPermiso)
    {
        $this->idPermiso = $idPermiso;

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
     * Method to set the value of field visualizar
     *
     * @param string $visualizar
     * @return $this
     */
    public function setVisualizar($visualizar)
    {
        $this->visualizar = $visualizar;

        return $this;
    }

    /**
     * Method to set the value of field editar
     *
     * @param string $editar
     * @return $this
     */
    public function setEditar($editar)
    {
        $this->editar = $editar;

        return $this;
    }

    /**
     * Method to set the value of field eliminar
     *
     * @param string $eliminar
     * @return $this
     */
    public function setEliminar($eliminar)
    {
        $this->eliminar = $eliminar;

        return $this;
    }

    /**
     * Method to set the value of field crear
     *
     * @param string $crear
     * @return $this
     */
    public function setCrear($crear)
    {
        $this->crear = $crear;

        return $this;
    }

    /**
     * Method to set the value of field idRol
     *
     * @param integer $idRol
     * @return $this
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * Returns the value of field idPermiso
     *
     * @return integer
     */
    public function getIdPermiso()
    {
        return $this->idPermiso;
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
     * Returns the value of field visualizar
     *
     * @return string
     */
    public function getVisualizar()
    {
        return $this->visualizar;
    }

    /**
     * Returns the value of field editar
     *
     * @return string
     */
    public function getEditar()
    {
        return $this->editar;
    }

    /**
     * Returns the value of field eliminar
     *
     * @return string
     */
    public function getEliminar()
    {
        return $this->eliminar;
    }

    /**
     * Returns the value of field crear
     *
     * @return string
     */
    public function getCrear()
    {
        return $this->crear;
    }

    /**
     * Returns the value of field idRol
     *
     * @return integer
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("syllabus_ean_db");
        $this->setSource("permiso");
        $this->belongsTo('idRol', 'ean\cc\Rol', 'idRol', ['alias' => 'Rol']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'permiso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permiso[]|Permiso|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permiso|\Phalcon\Mvc\Model\ResultInterface
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
            'idPermiso' => 'idPermiso',
            'descripcion' => 'descripcion',
            'visualizar' => 'visualizar',
            'editar' => 'editar',
            'eliminar' => 'eliminar',
            'crear' => 'crear',
            'idRol' => 'idRol'
        ];
    }

}
