<?php
namespace Feedaty\Badge\Observer;

use Feedaty\Badge\Model\Config\Source\WebService;
use \Magento\Framework\Event\ObserverInterface;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Framework\Registry;
use Feedaty\Badge\Helper\Data as DataHelp;

class ProductBadge implements ObserverInterface
{

    /**
    * @var \Magento\Framework\App\Config\ScopeConfigInterface
    */
    protected $scopeConfig;

    /**
    * @var \Magento\Store\Model\StoreManagerInterface
    */
    protected $storeManager;

    /**
    * @var \Magento\Framework\Registry
    */
    protected $registry;

    /*
    * Constructor
    */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager,
        Registry $registry,
        DataHelp $dataHelper,
        WebService $fdservice
        ) 
    {
        $this->_scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        $this->registry = $registry;
        $this->_dataHelper = $dataHelper;
        $this->_fdservice = $fdservice;
    }

    /*
    *
    *
    */
    public function execute(\Magento\Framework\Event\Observer $observer) {

        $zoorate_env = "widget.zoorate.com";
        
        $store_scope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

        $block = $observer->getBlock();

        $fdWidgetPos = $this->_scopeConfig->getValue(

            'feedaty_badge_options/widget_products/prod_position', $store_scope

        );

        $merchant = $this->_scopeConfig->getValue(

            'feedaty_global/feedaty_preferences/feedaty_code', $store_scope

        );

        $badge_style = $this->_scopeConfig->getValue(

            'feedaty_badge_options/widget_products/prod_style', $store_scope

        );

        $plugin_enabled = $this->_scopeConfig->getValue(

            'feedaty_badge_options/widget_products/prod_enabled', $store_scope

        );

        $variant = $this->_scopeConfig->getValue(

            'feedaty_badge_options/widget_products/prod_variant', $store_scope

        );

        $guilang = $this->_scopeConfig->getValue(

            'feedaty_badge_options/widget_products/prod_guilang', $store_scope

        );

        $rvlang = $this->_scopeConfig->getValue(

            'feedaty_badge_options/widget_products/prod_rvlang', $store_scope

        );

        if ( $observer->getElementName() == $fdWidgetPos ) 
        {

            if ( $plugin_enabled != 0 )  {

                $product = $this->registry->registry('current_product');

                if ( $product !== null ) {

                    $product = $product->getId();

                    // Rendere Persistente ?

                    $data = $this->_fdservice->getFeedatyData( $merchant );

                    if( count( $data ) > 0 ) {

                        $ver = json_decode( json_encode( $this->_dataHelper->getExtensionVersion() ), true );

                        if( array_key_exists( $badge_style, $data )) {

                            $widget = $data[$badge_style];

                            if(array_key_exists($variant, $widget["variants"])) {

                                $name = $widget["name"];

                                $variant = $widget["variants"][$variant];

                                $rvlang = $rvlang ? $rvlang : "all";

                                $guilang = $guilang ? $guilang : "it-IT";

                                $widget['html'] = str_replace("ZOORATE_SERVER", $zoorate_env, $widget['html']);
                                $widget['html'] = str_replace("VARIANT", $variant, $widget['html']);
                                $widget['html'] = str_replace("GUI_LANG", $guilang, $widget['html']);
                                $widget['html'] = str_replace("REV_LANG", $rvlang, $widget['html']);
                                $widget['html'] = str_replace("SKU", $product,$widget['html']);

                                $html = $observer->getTransport()->getOutput();

                                $html .= '<!-- PlPMa '.$ver[0].' -->'. htmlspecialchars_decode($widget['html']);

                                $observer->getTransport()->setOutput($html);

                            }

                        }

                    }

                }

            }
        }
    }
}
