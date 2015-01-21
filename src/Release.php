<?php
/**
 * PHP Version 5.5
 * @category Library
 * @package ChangeLog
 * @author Steve "uru" West <steve.david.west@gmail.com>
 * @license MIT http://opensource.org/licenses/MIT
 * @link https://github.com/stevewest/changelog
 */

namespace ChangeLog;

/**
 * Contains information about an individual release.
 */
class Release
{

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var bool
	 */
	protected $yanked = false;

	/**
	 * @var string
	 */
	protected $link;

	/**
	 * List of all changes in this release indexed by change type.
	 *
	 * @var array
	 */
	protected $changes = [];

	/**
	 * @param string $name
	 */
	public function __construct($name = null)
	{
		$this->setName($name);
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return boolean
	 */
	public function isYanked()
	{
		return $this->yanked;
	}

	/**
	 * @param boolean $yanked
	 */
	public function setYanked($yanked)
	{
		$this->yanked = $yanked;
	}

	/**
	 * @return string
	 */
	public function getLink()
	{
		return $this->link;
	}

	/**
	 * @param string $link
	 */
	public function setLink($link)
	{
		$this->link = $link;
	}

	/**
	 * Adds a change to the release.
	 *
	 * @param string $type
	 * @param string $message
	 */
	public function addChange($type, $message)
	{
		$this->changes[$type][] = $message;
	}

	/**
	 * Sets all the changes for the given type
	 *
	 * @param string   $type
	 * @param string[] $changes
	 */
	public function setChanges($type, $changes)
	{
		$this->changes[$type] = $changes;
	}

	/**
	 * Returns all changes for the given type or null if there are no changes.
	 *
	 * @param string $type
	 *
	 * @return string[]|null
	 */
	public function getChanges($type)
	{
		if ( ! isset($this->changes[$type]))
		{
			return null;
		}

		return $this->changes[$type];
	}

	/**
	 * Returns all changes in the release indexed by type
	 *
	 * @return array
	 */
	public function getAllChanges()
	{
		return $this->changes;
	}

	/**
	 * Sets all the changes for the release, should be indexed by change type.
	 *
	 * @param string[] $changes
	 */
	public function setAllChanges($changes)
	{
		$this->changes = $changes;
	}

}