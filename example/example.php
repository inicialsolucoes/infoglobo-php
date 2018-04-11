<?php

try {

	require_once(dirname(__FILE__) . '/../init.php');
	require_once(dirname(__FILE__) . '/../vendor/autoload.php');

	// Production API - https://api-ig.infoglobo.com.br/
	// Developer API - https://apiqlt-ig.infoglobo.com.br/

	$infoGlobo = new InfoGlobo\InfoGlobo();
	$infoGlobo->setApiBaseUrl ('https://api-ig.infoglobo.com.br/');
	$infoGlobo->setApiAuthUser('username');
	$infoGlobo->setApiAuthPass('password');
	$infoGlobo->setApiCustomer('customer');

	$customer = $infoGlobo->getCustomerByCpf('96356986523');

	var_dump($customer);

} catch (Exception $e) {

	var_dump($e);
}