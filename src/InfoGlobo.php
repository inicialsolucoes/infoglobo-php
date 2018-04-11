<?php

namespace InfoGlobo;

use GuzzleHttp\Client;
use GuzzleHttp\Promisse;
use GuzzleHttp\Psr7;
use InfoGlobo\Model\Customer;

/**
 * InfoGlobo
 * @author Inicial Soluções <contato@inicial.com.br>
 *
 * @link https://github.com/inicialcombr/claroclube-php
 */
class InfoGlobo
{
	/**
	 * @access private
	 * @var string
	 */
	private $__apiBaseUrl = null;

	/**
	 * @access private
	 * @var string
	 */
	private $__apiAuthUser = null;

	/**
	 * @access private
	 * @var string
	 */
	private $__apiAuthPass = null;

	/**
	 * @access private
	 * @var string
	 */
	private $__apiCustomer = null;

	/**
	 * @access private
	 * @var SoapClient
	 */
	private $__client = null;

	/**
	 * @param string $apiAuthUser
	 * @param string $apiAuthPass
	 * @param string $apiBaseUrl
	 *
	 * @return InfoGlobo
	 */
	public function __construct($apiAuthUser = null, $apiAuthPass = null, $apiBaseUrl = null)
	{
		if(!is_null($apiAuthUser)) {
			$this->setApiAuthUser($apiAuthUser);
		}

		if(!is_null($apiAuthPass)) {
			$this->setApiAuthPass($apiAuthPass);
		}

		if(!is_null($apiBaseUrl)) {
			$this->setApiBaseUrl($apiBaseUrl);
		}

		return $this;
	}

	/**
	 * @param string $param
	 *
	 * @return InfoGlobo
	 */
	public function setApiBaseUrl($param)
	{
		$this->__apiBaseUrl = (string) $param;

		return $this;
	}

	/**
	 * @param string $param
	 *
	 * @return InfoGlobo
	 */
	public function setApiAuthUser($param)
	{
		$this->__apiAuthUser = (string) $param;

		return $this;
	}

	/**
	 * @param string $param
	 *
	 * @return InfoGlobo
	 */
	public function setApiAuthPass($param)
	{
		$this->__apiAuthPass = (string) $param;

		return $this;
	}

	/**
	 * @param string $param
	 *
	 * @return InfoGlobo
	 */
	public function setApiCustomer($param)
	{
		$this->__apiCustomer = (string) $param;

		return $this;
	}

	/**
	 * @return GuzzleHttp\Client
	 */
	public function getClient()
	{
		if ($this->__client) {
			return $this->__client;
		}

		$this->__client = new Client([
			'base_uri' => $this->__apiBaseUrl,
			'auth' => [
				$this->__apiAuthUser,
				$this->__apiAuthPass,
			]
		]);

		$response  		  = $this->__client->get('token-autenticacao');
		$responseBody 	  = $response->getBody();
		$responseContents = $responseBody->getContents();
		$responseData  	  = json_decode($responseContents);

		$accessToken = 'token-acesso';
		$accessToken = $responseData->$accessToken;

		$this->__client = new Client([
			'base_uri' => $this->__apiBaseUrl,
			'headers' => [
				'Authorization' => "OAuth2 {$accessToken}"
			]
		]);

		return $this->__client;
	}

	/**
	 * @param string $cpf
	 *
	 * @return InfoGlobo\Customer
	 */
	public function getCustomerByCpf($cpf)
	{
		$customer = new Customer();

		$response = $this->getClient()->post('relacionamento/v2/parceirodenegocio/solicitacaoclassificacao', [
			'query' => [
				'numerodocumento' => $cpf,
				'tipodocumento'   => 'CPF',
				'publicacoes'     => 'OG,GD',
				'ig-consumidor'   => $this->__apiCustomer,
				'ig-requestid'    => time()
			]
		]);

		libxml_use_internal_errors(true);

		$responseBody 	  = $response->getBody();
		$responseContents = $responseBody->getContents();
		$responseData  	  = simplexml_load_string($responseContents);

		if (is_object($responseData)) {

			$customer->setIsSubscriber($responseData->assinante);
			$customer->setProfile($responseData->perfil);
			$customer->setSegment($responseData->segmento);
		}

		return $customer;
	}
}