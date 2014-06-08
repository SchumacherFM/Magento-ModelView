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
abstract class SchumacherFM_ModelView_Model_Product_AbstractView extends Mage_Core_Model_Abstract
{
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'product_abstract_view';

    /**
     * Parameter name in event
     *
     * In observe method you can use $observer->getEvent()->getObject() in this case
     *
     * @var string
     */
    protected $_eventObject = 'product_view';

    /**
     * define here column name => type
     * name => string
     * qty => float
     * price => float
     *
     * if not set does no conversion
     *
     * @var array
     */
    protected $_columnTypes = array();

    /**
     * @var array
     */
    protected $_dataKeys = null;

    /**
     * type safe getData
     *
     * @param string $key
     * @param null   $index
     *
     * @return float|int|mixed
     * @throws InvalidArgumentException
     */
    public function getData($key = '', $index = null)
    {
        $data = parent::getData($key, $index);

        if ('' !== $key && false === $this->_keyExistsInData($key)) {
            throw new InvalidArgumentException('The key ' . $key . ' cannot be found in the current data set: ' . print_r($this->_data, 1));
        }

        if (isset($this->_columnTypes[$key])) {
            if ('int' === $this->_columnTypes[$key]) {
                $data = (int)$data;
            } elseif ('float' === $this->_columnTypes[$key] || 'double' === $this->_columnTypes[$key]) {
                $data = (float)$data;
            }
        }
        return $data;
    }

    /**
     * instead of array_key_exists ... haven't tested the performance ... 8-) but you know ...
     *
     * @param $key
     *
     * @return bool
     */
    protected function _keyExistsInData($key)
    {
        if (null === $this->_dataKeys) {
            $this->_dataKeys = array_flip(array_keys($this->_data));
        }
        return isset($this->_dataKeys[$key]);
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