<?php

/**
 * @author Gustavo Bravo <gbravo@lyracons.com>
 * @copyright  Copyright 2020 Covedisa
 */

namespace SplashLab\CorsRequests\Response\HeaderProvider;

use Magento\Framework\App\Response\HeaderProvider\AbstractHeaderProvider;

/**
 * Class AllowOriginHeaderProvider
 *
 * @package SplashLab\CorsRequests
 */
class AllowOriginHeaderProvider extends AbstractHeaderProvider
{
    /**
     * @var string
     */
    protected $headerName = 'Access-Control-Allow-Origin';

    /**
     * @var string
     */
    protected $headerValue = '';

    /**
     * Initialize dependencies.
     *
     * @param \Magento\Framework\Webapi\Rest\Response $response
     * @param \Magento\Framework\App\Config\ScopeConfigInterface scopeConfig
     */
    public function __construct(
        \Magento\Framework\Webapi\Rest\Response $response,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->response = $response;
        $this->scopeConfig = $scopeConfig;
    }

    public function getValue()
    {
        return $this->scopeConfig->getValue('web/corsRequests/origin_url',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
