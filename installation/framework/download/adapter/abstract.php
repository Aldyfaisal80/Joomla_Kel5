<?php
/**
 * ANGIE - The site restoration script for backup archives created by Akeeba Backup and Akeeba Solo
 *
 * @package   angie
 * @copyright Copyright (c)2009-2024 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

defined('_AKEEBA') or die();

abstract class ADownloadAdapterAbstract implements ADownloadInterface
{
	/**
	 * Load order priority
	 *
	 * @var  int
	 */
	public $priority = 100;

	/**
	 * Name of the adapter (identical to filename)
	 *
	 * @var  string
	 */
	public $name = '';

	/**
	 * Is this adapter supported in the current execution environment?
	 *
	 * @var  bool
	 */
	public $isSupported = false;

	/**
	 * Does this adapter support chunked downloads?
	 *
	 * @var  bool
	 */
	public $supportsChunkDownload = false;

	/**
	 * Does this adapter support querying the remote file's size?
	 *
	 * @var  bool
	 */
	public $supportsFileSize = false;

	/**
	 * Does this download adapter support downloading files in chunks?
	 *
	 * @return  boolean  True if chunk download is supported
	 */
	public function supportsChunkDownload()
	{
		return $this->supportsChunkDownload;
	}

	/**
	 * Does this download adapter support reading the size of a remote file?
	 *
	 * @return  boolean  True if remote file size determination is supported
	 */
	public function supportsFileSize()
	{
		return $this->supportsFileSize;
	}

	/**
	 * Is this download class supported in the current server environment?
	 *
	 * @return  boolean  True if this server environment supports this download class
	 */
	public function isSupported()
	{
		return $this->isSupported;
	}

	/**
	 * Get the priority of this adapter. If multiple download adapters are
	 * supported on a site, the one with the highest priority will be
	 * used.
	 *
	 * @return  boolean
	 */
	public function getPriority()
	{
		return $this->priority;
	}

	/**
	 * Returns the name of this download adapter in use
	 *
	 * @return  string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Download a part (or the whole) of a remote URL and return the downloaded
	 * data. You are supposed to check the size of the returned data. If it's
	 * smaller than what you expected you've reached end of file. If it's empty
	 * you have tried reading past EOF. If it's larger than what you expected
	 * the server doesn't support chunk downloads.
	 *
	 * If this class' supportsChunkDownload returns false you should assume
	 * that the $from and $to parameters will be ignored.
	 *
	 * @param   string   $url     The remote file's URL
	 * @param   integer  $from    Byte range to start downloading from. Use null for start of file.
	 * @param   integer  $to      Byte range to stop downloading. Use null to download the entire file ($from is ignored)
	 * @param   array    $params  Additional params that will be added before performing the download
	 *
	 * @return  string  The raw file data retrieved from the remote URL.
	 *
	 * @throws  AExceptionDownload  A generic exception is thrown on error
	 */
	public function downloadAndReturn($url, $from = null, $to = null, array $params = array())
	{
		return '';
	}

	/**
	 * Get the size of a remote file in bytes
	 *
	 * @param   string  $url  The remote file's URL
	 *
	 * @return  integer  The file size, or -1 if the remote server doesn't support this feature
	 */
	public function getFileSize($url)
	{
		return -1;
	}
}
