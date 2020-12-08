<?php
/**
 * Venustheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the venustheme.com license that is
 * available through the world-wide-web at this URL:
 * http://venustheme.com/license
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category  Venustheme
 * @package   Ves_Testimonial
 * @copyright Copyright (c) 2017 Landofcoder (http://www.venustheme.com/)
 * @license   http://www.venustheme.com/LICENSE-1.0.html
 */

namespace Ves\Testimonial\Model\ResourceModel\Testimonial;

use \Ves\Testimonial\Model\ResourceModel\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_is_joined_product = false;
    /**
     * @var string
     */
    protected $_idFieldName = 'testimonial_id';


    /**
     * Perform operations after collection load
     *
     * @return $this
     */
    protected function _afterLoad()
    {
        $this->performAfterLoad('ves_testimonial_testimonial_store', 'testimonial_id');

        return parent::_afterLoad();

    }//end _afterLoad()


    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ves\Testimonial\Model\Testimonial', 'Ves\Testimonial\Model\ResourceModel\Testimonial');
        $this->_map['fields']['store'] = 'store_table.store_id';

    }//end _construct()


    /**
     * Returns pairs category_id - title
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->_toOptionArray('testimonial_id', 'title');

    }//end toOptionArray()


    /**
     * Add filter by store
     *
     * @param  int|array|\Magento\Store\Model\Store $store
     * @param  bool                                 $withAdmin
     * @return $this
     */
    public function addStoreFilter($store, $withAdmin = true)
    {
        if (!$this->getFlag('store_filter_added')) {
            $this->performAddStoreFilter($store, $withAdmin);
        }

        return $this;

    }//end addStoreFilter()

    public function addProductFilter($product_id = 0)
    {
        if($product_id) {
            if(!$this->_is_joined_product) {
                $this->getSelect()->join(
                    ['product_table' => $this->getTable('ves_testimonial_testimonial_product')],
                    'main_table.testimonial_id = product_table.testimonial_id',
                    []
                )->group(
                    'main_table.testimonial_id'
                );
                $this->_is_joined_product = true;
            }
            $this->addFieldToFilter('product_id', (int)$product_id);
        }
        return $this;

    }//end addStoreFilter()
    /**
     * Join store relation table if there is store filter
     *
     * @return void
     */
    protected function _renderFiltersBefore()
    {
        $this->joinStoreRelationTable('ves_testimonial_testimonial_store', 'testimonial_id');

    }//end _renderFiltersBefore()


}//end class
