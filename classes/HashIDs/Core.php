<?php

class HashIDs_Core extends \Hashids\Hashids {
	protected static $instance = null;

	function __construct()
	{
        $config = Kohana::$config->load('hashid');

		parent::__construct(
			$config->get('salt'),
            $config->get('min_hash_length'),
            $config->get('alphabet')
        );
	}

	/**
	 * @param string $hash
	 *
	 * @return null|int
	 */
	function decrypt_one($hash)
	{
		$hash = $this->decode($hash);
		if (isset($hash[0]))
		{
			return $hash[0];
		}
		return null;
	}

	/**
	 * @return HashIDs_Core
	 */
	static function instance()
	{
		if (!(self::$instance instanceof self))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
}
