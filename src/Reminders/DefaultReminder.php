<?php namespace Digbang\Security\Reminders;

use Carbon\Carbon;
use Digbang\Doctrine\TimestampsTrait;
use Digbang\Security\Users\User;

class DefaultReminder implements Reminder
{
	use TimestampsTrait;

	/**
	 * @type int
	 */
	private $id;

	/**
	 * @type User
	 */
	private $user;

	/**
	 * @type string
	 */
	private $code;

	/**
	 * @type bool
	 */
	private $completed = false;

	/**
	 * @type Carbon
	 */
	private $completedAt;

	/**
	 * DefaultReminder constructor.
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
		$this->code = str_random(32);
	}

	/**
	 * {@inheritdoc}
	 */
	public function complete()
	{
		$this->completed = true;
		$this->completedAt = Carbon::now();
	}

	/**
	 * @return User
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * @return boolean
	 */
	public function isCompleted()
	{
		return $this->completed;
	}

	/**
	 * @return Carbon
	 */
	public function getCompletedAt()
	{
		return $this->completedAt;
	}

	/**
	 * @return \Carbon\Carbon
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	/**
	 * @return \Carbon\Carbon
	 */
	public function getUpdatedAt()
	{
		return $this->updatedAt;
	}

	/**
	 * @return string
	 */
	public function getCode()
	{
		return $this->code;
	}
}
