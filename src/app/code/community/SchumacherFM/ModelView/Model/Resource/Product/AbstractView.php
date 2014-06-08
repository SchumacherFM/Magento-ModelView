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
abstract class SchumacherFM_ModelView_Model_Resource_Product_AbstractView extends Mage_Catalog_Model_Resource_Product
{

    protected function _beforeSave(Varien_Object $object)
    {
        Mage::throwException('Not supported!');
    }

    protected function _afterSave(Varien_Object $product)
    {
        Mage::throwException('Not supported!');
    }

    protected function _beforeDelete(Varien_Object $object)
    {
        Mage::throwException('Not supported!');
    }

    protected function _afterDelete(Varien_Object $object)
    {
        Mage::throwException('Not supported!');
    }

    public function delete($object)
    {
        Mage::throwException('Not supported!');
    }

    public function save(Varien_Object $object)
    {
        Mage::throwException('Not supported!');
    }

    public function hasDataChanged()
    {
        return false;
    }

    protected function _saveCategories(Varien_Object $object)
    {
        Mage::throwException('Not supported!');
    }

    public function duplicate($oldId, $newId)
    {
        Mage::throwException('Not supported!');
    }

    public function refreshEnabledIndex($store = null, $product = null)
    {
        Mage::throwException('Not supported!');
    }

    public function refreshIndex($product)
    {
        Mage::throwException('Not supported!');
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
