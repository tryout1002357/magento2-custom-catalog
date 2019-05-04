<?php
namespace Tryout\CustomCatalog\Api;
 
interface VpnInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $vpn Product data.
     * @return string Greeting message with Product data.
     */
    public function vpn($vpn);
}
