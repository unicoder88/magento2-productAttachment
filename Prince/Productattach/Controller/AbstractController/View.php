<?php

/**
 * Mageprince
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @package Prince_Productattach
 */

namespace Prince\Productattach\Controller\AbstractController;

use Magento\Framework\App\Action;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class View
 * @package Prince\Productattach\Controller\AbstractController
 */
abstract class View extends Action\Action
{
    /**
     * @var \Prince\Productattach\Controller\AbstractController\ProductattachLoaderInterface
     */
    private $productattachLoader;
    
    /**
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * @param Action\Context $context
     * @param OrderLoaderInterface $orderLoader
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Action\Context $context,
        ProductattachLoaderInterface $productattachLoader,
        PageFactory $resultPageFactory
    ) {
        $this->productattachLoader = $productattachLoader;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Productattach view page
     *
     * @return void
     */
    public function execute()
    {
        if (!$this->productattachLoader->load($this->_request, $this->_response)) {
            return;
        }

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
