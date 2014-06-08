<?php

/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 *
 * @category    SchumacherFM_ModelView
 * @author      Cyrill at Schumacher dot fm / @SchumacherFM
 * @copyright   Copyright (c)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
abstract class SchumacherFM_ModelView_Model_Resource_Product_AbstractView_Collection extends Mage_Catalog_Model_Resource_Product_Collection
{
    protected $_itemObjectClassName = null;

    /**
     * _construct is too early because no connection has not yet been set.
     *
     * @param null  $resource
     * @param array $args
     */
    public function __construct($resource = null, array $args = array())
    {
        parent::__construct($resource, $args);
        $this->_removeSelectInitColumns();
        $this->_initView();
    }

    /**
     * override here the itemObjectClass
     */
    protected function _construct()
    {
        parent::_construct();
        if (null === $this->_itemObjectClassName) {
            Mage::throwException('$this->_itemObjectClass cannot be null!');
        }
        $this->setItemObjectClass($this->_itemObjectClassName);
    }

    protected function _removeSelectInitColumns()
    {
        $this->getSelect()->setPart('columns', array());
    }

    /**
     * @return string
     */
    public function getSql()
    {
        return $this->getSelect()->__toString();
    }

    /**
     * Main method which must be used to create the view query
     *
     * @return mixed
     */
    abstract protected function _initView();

    /**
     * disable events, url rewrites, etc
     * @return $this|Mage_Catalog_Model_Resource_Product_Collection
     */
    protected function _beforeLoad()
    {
        return $this;
    }

    /**
     * disable events, url rewrites, etc
     * @return $this|Mage_Catalog_Model_Resource_Product_Collection
     */
    protected function _afterLoad()
    {
        return $this;
    }

    /**
     * Disabled because we want to know what is called on the class
     *
     * @param string $method
     * @param array  $args
     *
     * @return void
     * @throws InvalidArgumentException
     */
    public function __call($method, $args)
    {
        $pArgs = !empty($args) ? print_r($args, 1) : '';
        throw new InvalidArgumentException(get_class($this) . '::__call method disabled: ' . $method . '(' . $pArgs . ')');
    }
}