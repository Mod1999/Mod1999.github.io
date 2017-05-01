<?php

class Casegame extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $image;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $price;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $created_at;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $modified_in;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $type;

    /**
     *
     * @var string
     * @Column(type="string", length=800, nullable=false)
     */
    public $name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $position;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $banker;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $bank;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $maxwin;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'casegame';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Casegame[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Casegame
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
