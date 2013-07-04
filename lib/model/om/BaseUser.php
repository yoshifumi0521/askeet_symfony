<?php


abstract class BaseUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nickname;


	
	protected $email;


	
	protected $sha1_password;


	
	protected $salt;


	
	protected $first_name;


	
	protected $last_name;


	
	protected $created_at;

	
	protected $collQuestions;

	
	protected $lastQuestionCriteria = null;

	
	protected $collAnswers;

	
	protected $lastAnswerCriteria = null;

	
	protected $collInterests;

	
	protected $lastInterestCriteria = null;

	
	protected $collRelevancys;

	
	protected $lastRelevancyCriteria = null;

	
	protected $collQuestionTags;

	
	protected $lastQuestionTagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNickname()
	{

		return $this->nickname;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getSha1Password()
	{

		return $this->sha1_password;
	}

	
	public function getSalt()
	{

		return $this->salt;
	}

	
	public function getFirstName()
	{

		return $this->first_name;
	}

	
	public function getLastName()
	{

		return $this->last_name;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserPeer::ID;
		}

	} 
	
	public function setNickname($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nickname !== $v) {
			$this->nickname = $v;
			$this->modifiedColumns[] = UserPeer::NICKNAME;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UserPeer::EMAIL;
		}

	} 
	
	public function setSha1Password($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sha1_password !== $v) {
			$this->sha1_password = $v;
			$this->modifiedColumns[] = UserPeer::SHA1_PASSWORD;
		}

	} 
	
	public function setSalt($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->salt !== $v) {
			$this->salt = $v;
			$this->modifiedColumns[] = UserPeer::SALT;
		}

	} 
	
	public function setFirstName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[] = UserPeer::FIRST_NAME;
		}

	} 
	
	public function setLastName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[] = UserPeer::LAST_NAME;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = UserPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nickname = $rs->getString($startcol + 1);

			$this->email = $rs->getString($startcol + 2);

			$this->sha1_password = $rs->getString($startcol + 3);

			$this->salt = $rs->getString($startcol + 4);

			$this->first_name = $rs->getString($startcol + 5);

			$this->last_name = $rs->getString($startcol + 6);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(UserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collQuestions !== null) {
				foreach($this->collQuestions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAnswers !== null) {
				foreach($this->collAnswers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInterests !== null) {
				foreach($this->collInterests as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelevancys !== null) {
				foreach($this->collRelevancys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collQuestionTags !== null) {
				foreach($this->collQuestionTags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collQuestions !== null) {
					foreach($this->collQuestions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAnswers !== null) {
					foreach($this->collAnswers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInterests !== null) {
					foreach($this->collInterests as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelevancys !== null) {
					foreach($this->collRelevancys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collQuestionTags !== null) {
					foreach($this->collQuestionTags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNickname();
				break;
			case 2:
				return $this->getEmail();
				break;
			case 3:
				return $this->getSha1Password();
				break;
			case 4:
				return $this->getSalt();
				break;
			case 5:
				return $this->getFirstName();
				break;
			case 6:
				return $this->getLastName();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNickname(),
			$keys[2] => $this->getEmail(),
			$keys[3] => $this->getSha1Password(),
			$keys[4] => $this->getSalt(),
			$keys[5] => $this->getFirstName(),
			$keys[6] => $this->getLastName(),
			$keys[7] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNickname($value);
				break;
			case 2:
				$this->setEmail($value);
				break;
			case 3:
				$this->setSha1Password($value);
				break;
			case 4:
				$this->setSalt($value);
				break;
			case 5:
				$this->setFirstName($value);
				break;
			case 6:
				$this->setLastName($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNickname($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSha1Password($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSalt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFirstName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
		if ($this->isColumnModified(UserPeer::NICKNAME)) $criteria->add(UserPeer::NICKNAME, $this->nickname);
		if ($this->isColumnModified(UserPeer::EMAIL)) $criteria->add(UserPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UserPeer::SHA1_PASSWORD)) $criteria->add(UserPeer::SHA1_PASSWORD, $this->sha1_password);
		if ($this->isColumnModified(UserPeer::SALT)) $criteria->add(UserPeer::SALT, $this->salt);
		if ($this->isColumnModified(UserPeer::FIRST_NAME)) $criteria->add(UserPeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(UserPeer::LAST_NAME)) $criteria->add(UserPeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(UserPeer::CREATED_AT)) $criteria->add(UserPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		$criteria->add(UserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNickname($this->nickname);

		$copyObj->setEmail($this->email);

		$copyObj->setSha1Password($this->sha1_password);

		$copyObj->setSalt($this->salt);

		$copyObj->setFirstName($this->first_name);

		$copyObj->setLastName($this->last_name);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getQuestions() as $relObj) {
				$copyObj->addQuestion($relObj->copy($deepCopy));
			}

			foreach($this->getAnswers() as $relObj) {
				$copyObj->addAnswer($relObj->copy($deepCopy));
			}

			foreach($this->getInterests() as $relObj) {
				$copyObj->addInterest($relObj->copy($deepCopy));
			}

			foreach($this->getRelevancys() as $relObj) {
				$copyObj->addRelevancy($relObj->copy($deepCopy));
			}

			foreach($this->getQuestionTags() as $relObj) {
				$copyObj->addQuestionTag($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserPeer();
		}
		return self::$peer;
	}

	
	public function initQuestions()
	{
		if ($this->collQuestions === null) {
			$this->collQuestions = array();
		}
	}

	
	public function getQuestions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collQuestions === null) {
			if ($this->isNew()) {
			   $this->collQuestions = array();
			} else {

				$criteria->add(QuestionPeer::USER_ID, $this->getId());

				QuestionPeer::addSelectColumns($criteria);
				$this->collQuestions = QuestionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(QuestionPeer::USER_ID, $this->getId());

				QuestionPeer::addSelectColumns($criteria);
				if (!isset($this->lastQuestionCriteria) || !$this->lastQuestionCriteria->equals($criteria)) {
					$this->collQuestions = QuestionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastQuestionCriteria = $criteria;
		return $this->collQuestions;
	}

	
	public function countQuestions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(QuestionPeer::USER_ID, $this->getId());

		return QuestionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addQuestion(Question $l)
	{
		$this->collQuestions[] = $l;
		$l->setUser($this);
	}

	
	public function initAnswers()
	{
		if ($this->collAnswers === null) {
			$this->collAnswers = array();
		}
	}

	
	public function getAnswers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAnswerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnswers === null) {
			if ($this->isNew()) {
			   $this->collAnswers = array();
			} else {

				$criteria->add(AnswerPeer::USER_ID, $this->getId());

				AnswerPeer::addSelectColumns($criteria);
				$this->collAnswers = AnswerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnswerPeer::USER_ID, $this->getId());

				AnswerPeer::addSelectColumns($criteria);
				if (!isset($this->lastAnswerCriteria) || !$this->lastAnswerCriteria->equals($criteria)) {
					$this->collAnswers = AnswerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAnswerCriteria = $criteria;
		return $this->collAnswers;
	}

	
	public function countAnswers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAnswerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AnswerPeer::USER_ID, $this->getId());

		return AnswerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAnswer(Answer $l)
	{
		$this->collAnswers[] = $l;
		$l->setUser($this);
	}


	
	public function getAnswersJoinQuestion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAnswerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnswers === null) {
			if ($this->isNew()) {
				$this->collAnswers = array();
			} else {

				$criteria->add(AnswerPeer::USER_ID, $this->getId());

				$this->collAnswers = AnswerPeer::doSelectJoinQuestion($criteria, $con);
			}
		} else {
									
			$criteria->add(AnswerPeer::USER_ID, $this->getId());

			if (!isset($this->lastAnswerCriteria) || !$this->lastAnswerCriteria->equals($criteria)) {
				$this->collAnswers = AnswerPeer::doSelectJoinQuestion($criteria, $con);
			}
		}
		$this->lastAnswerCriteria = $criteria;

		return $this->collAnswers;
	}

	
	public function initInterests()
	{
		if ($this->collInterests === null) {
			$this->collInterests = array();
		}
	}

	
	public function getInterests($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInterestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInterests === null) {
			if ($this->isNew()) {
			   $this->collInterests = array();
			} else {

				$criteria->add(InterestPeer::USER_ID, $this->getId());

				InterestPeer::addSelectColumns($criteria);
				$this->collInterests = InterestPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InterestPeer::USER_ID, $this->getId());

				InterestPeer::addSelectColumns($criteria);
				if (!isset($this->lastInterestCriteria) || !$this->lastInterestCriteria->equals($criteria)) {
					$this->collInterests = InterestPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInterestCriteria = $criteria;
		return $this->collInterests;
	}

	
	public function countInterests($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInterestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InterestPeer::USER_ID, $this->getId());

		return InterestPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInterest(Interest $l)
	{
		$this->collInterests[] = $l;
		$l->setUser($this);
	}


	
	public function getInterestsJoinQuestion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInterestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInterests === null) {
			if ($this->isNew()) {
				$this->collInterests = array();
			} else {

				$criteria->add(InterestPeer::USER_ID, $this->getId());

				$this->collInterests = InterestPeer::doSelectJoinQuestion($criteria, $con);
			}
		} else {
									
			$criteria->add(InterestPeer::USER_ID, $this->getId());

			if (!isset($this->lastInterestCriteria) || !$this->lastInterestCriteria->equals($criteria)) {
				$this->collInterests = InterestPeer::doSelectJoinQuestion($criteria, $con);
			}
		}
		$this->lastInterestCriteria = $criteria;

		return $this->collInterests;
	}

	
	public function initRelevancys()
	{
		if ($this->collRelevancys === null) {
			$this->collRelevancys = array();
		}
	}

	
	public function getRelevancys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelevancyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelevancys === null) {
			if ($this->isNew()) {
			   $this->collRelevancys = array();
			} else {

				$criteria->add(RelevancyPeer::USER_ID, $this->getId());

				RelevancyPeer::addSelectColumns($criteria);
				$this->collRelevancys = RelevancyPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelevancyPeer::USER_ID, $this->getId());

				RelevancyPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelevancyCriteria) || !$this->lastRelevancyCriteria->equals($criteria)) {
					$this->collRelevancys = RelevancyPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelevancyCriteria = $criteria;
		return $this->collRelevancys;
	}

	
	public function countRelevancys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRelevancyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RelevancyPeer::USER_ID, $this->getId());

		return RelevancyPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRelevancy(Relevancy $l)
	{
		$this->collRelevancys[] = $l;
		$l->setUser($this);
	}


	
	public function getRelevancysJoinAnswer($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRelevancyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelevancys === null) {
			if ($this->isNew()) {
				$this->collRelevancys = array();
			} else {

				$criteria->add(RelevancyPeer::USER_ID, $this->getId());

				$this->collRelevancys = RelevancyPeer::doSelectJoinAnswer($criteria, $con);
			}
		} else {
									
			$criteria->add(RelevancyPeer::USER_ID, $this->getId());

			if (!isset($this->lastRelevancyCriteria) || !$this->lastRelevancyCriteria->equals($criteria)) {
				$this->collRelevancys = RelevancyPeer::doSelectJoinAnswer($criteria, $con);
			}
		}
		$this->lastRelevancyCriteria = $criteria;

		return $this->collRelevancys;
	}

	
	public function initQuestionTags()
	{
		if ($this->collQuestionTags === null) {
			$this->collQuestionTags = array();
		}
	}

	
	public function getQuestionTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collQuestionTags === null) {
			if ($this->isNew()) {
			   $this->collQuestionTags = array();
			} else {

				$criteria->add(QuestionTagPeer::USER_ID, $this->getId());

				QuestionTagPeer::addSelectColumns($criteria);
				$this->collQuestionTags = QuestionTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(QuestionTagPeer::USER_ID, $this->getId());

				QuestionTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastQuestionTagCriteria) || !$this->lastQuestionTagCriteria->equals($criteria)) {
					$this->collQuestionTags = QuestionTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastQuestionTagCriteria = $criteria;
		return $this->collQuestionTags;
	}

	
	public function countQuestionTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(QuestionTagPeer::USER_ID, $this->getId());

		return QuestionTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addQuestionTag(QuestionTag $l)
	{
		$this->collQuestionTags[] = $l;
		$l->setUser($this);
	}


	
	public function getQuestionTagsJoinQuestion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collQuestionTags === null) {
			if ($this->isNew()) {
				$this->collQuestionTags = array();
			} else {

				$criteria->add(QuestionTagPeer::USER_ID, $this->getId());

				$this->collQuestionTags = QuestionTagPeer::doSelectJoinQuestion($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionTagPeer::USER_ID, $this->getId());

			if (!isset($this->lastQuestionTagCriteria) || !$this->lastQuestionTagCriteria->equals($criteria)) {
				$this->collQuestionTags = QuestionTagPeer::doSelectJoinQuestion($criteria, $con);
			}
		}
		$this->lastQuestionTagCriteria = $criteria;

		return $this->collQuestionTags;
	}

} 