<?php

/**
 * SAVEME ().
 *
 * @author     Sanix Darker (https://github.com/Sanix-Darker)
 * @version    1.0
 */
class SAVEME
{
	const MAX_SQL_SIZE = 1e6;

	const NONE = 0;
	const DROP = 1;
	const CREATE = 2;
	const DATA = 4;
	const TRIGGERS = 8;
	const ALL = 15; // DROP | CREATE | DATA | TRIGGERS

	/** @var array */
	public $tables = array(
		'*' => self::ALL,
	);

	/** @var mysqli */
	private $connection;


	/**
	 * Connects to database.
	 * @param  mysqli connection
	 */
	public function __construct(mysqli $connection, $charset = 'utf8')
	{
		$this->connection = $connection;

		if ($connection->connect_errno) {
			throw new Exception($connection->connect_error);

		} elseif (!$connection->set_charset($charset)) { // was added in MySQL 5.0.7 and PHP 5.0.5, fixed in PHP 5.1.5)
			throw new Exception($connection->error);
		}
	}


	private function delimite($s)
	{
		return '`' . str_replace('`', '``', $s) . '`';
	}
}
