<?php
namespace Info\Installer\Interfaces;
use Info\Installer\Interfaces\CurlRequestInterface;

interface PurchaseInterface {
	function getPurchaseStatus($domainName, $domainIp, $envatopurchasecode, $envatoUsername);
}