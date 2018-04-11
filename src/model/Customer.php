<?php

namespace InfoGlobo\Model;

/**
 * Customer
 * @author Inicial Soluções <contato@inicial.com.br>
 */
class Customer
{
	/**
	 * @access private
	 * @var boolean
	 */
	private $__isSubscriber = false;

	/**
	 * @access private
	 * @var string
	 */
	private $__profile = null;

	/**
	 * @access private
	 * @var string
	 */
	private $__segment = null;

	/**
	 * @param bool $value
	 */
	public function setIsSubscriber($value)
	{
		$this->__isSubscriber = (bool) $this->__parseIsSubscriber($value);
	}

	/**
	 * @return bool
	 */
	public function getIsSubscriber()
	{
		return (bool) $this->__isSubscriber;
	}

	/**
	 * @param string $value
	 */
	public function setProfile($value)
	{
		$this->__profile = (string) $value;
	}

	/**
	 * @return string
	 */
	public function getProfile()
	{
		return (string) $this->__profile;
	}

	/**
	 * @param string $value
	 */
	public function setSegment($value)
	{
		$this->__segment = (string) $value;
	}

	/**
	 * @return string
	 */
	public function getSegment()
	{
		return (string) $this->__segment;
	}

	/**
	 * @param string $value
	 */
	private function __parseIsSubscriber($value)
	{
		return $value == 'true' ? true : false;
	}
}
