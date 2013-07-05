<?php


abstract class BaseQuestionTag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $question_id;


	
	protected $tag;


	
	protected $name;


	
	protected $name2;


	
	protected $normalized_tag;


	
	protected $id;

	
	protected $aUser;

	
	protected $aQuestion;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getQuestionId()
	{

		return $this->question_id;
	}

	
	public function getTag()
	{

		return $this->tag;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getName2()
	{

		return $this->name2;
	}

	
	public function getNormalizedTag()
	{

		return $this->normalized_tag;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setUserId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = QuestionTagPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setQuestionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->question_id !== $v) {
			$this->question_id = $v;
			$this->modifiedColumns[] = QuestionTagPeer::QUESTION_ID;
		}

		if ($this->aQuestion !== null && $this->aQuestion->getId() !== $v) {
			$this->aQuestion = null;
		}

	} 
	
	public function setTag($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tag !== $v) {
			$this->tag = $v;
			$this->modifiedColumns[] = QuestionTagPeer::TAG;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = QuestionTagPeer::NAME;
		}

	} 
	
	public function setName2($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name2 !== $v) {
			$this->name2 = $v;
			$this->modifiedColumns[] = QuestionTagPeer::NAME2;
		}

	} 
	
	public function setNormalizedTag($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->normalized_tag !== $v) {
			$this->normalized_tag = $v;
			$this->modifiedColumns[] = QuestionTagPeer::NORMALIZED_TAG;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = QuestionTagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->question_id = $rs->getInt($startcol + 1);

			$this->tag = $rs->getString($startcol + 2);

			$this->name = $rs->getString($startcol + 3);

			$this->name2 = $rs->getString($startcol + 4);

			$this->normalized_tag = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating QuestionTag object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(QuestionTagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			QuestionTagPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(QuestionTagPeer::DATABASE_NAME);
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


												
			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}

			if ($this->aQuestion !== null) {
				if ($this->aQuestion->isModified()) {
					$affectedRows += $this->aQuestion->save($con);
				}
				$this->setQuestion($this->aQuestion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = QuestionTagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += QuestionTagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aQuestion !== null) {
				if (!$this->aQuestion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aQuestion->getValidationFailures());
				}
			}


			if (($retval = QuestionTagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = QuestionTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getQuestionId();
				break;
			case 2:
				return $this->getTag();
				break;
			case 3:
				return $this->getName();
				break;
			case 4:
				return $this->getName2();
				break;
			case 5:
				return $this->getNormalizedTag();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = QuestionTagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getQuestionId(),
			$keys[2] => $this->getTag(),
			$keys[3] => $this->getName(),
			$keys[4] => $this->getName2(),
			$keys[5] => $this->getNormalizedTag(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = QuestionTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setQuestionId($value);
				break;
			case 2:
				$this->setTag($value);
				break;
			case 3:
				$this->setName($value);
				break;
			case 4:
				$this->setName2($value);
				break;
			case 5:
				$this->setNormalizedTag($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = QuestionTagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setQuestionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setName2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNormalizedTag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(QuestionTagPeer::DATABASE_NAME);

		if ($this->isColumnModified(QuestionTagPeer::USER_ID)) $criteria->add(QuestionTagPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(QuestionTagPeer::QUESTION_ID)) $criteria->add(QuestionTagPeer::QUESTION_ID, $this->question_id);
		if ($this->isColumnModified(QuestionTagPeer::TAG)) $criteria->add(QuestionTagPeer::TAG, $this->tag);
		if ($this->isColumnModified(QuestionTagPeer::NAME)) $criteria->add(QuestionTagPeer::NAME, $this->name);
		if ($this->isColumnModified(QuestionTagPeer::NAME2)) $criteria->add(QuestionTagPeer::NAME2, $this->name2);
		if ($this->isColumnModified(QuestionTagPeer::NORMALIZED_TAG)) $criteria->add(QuestionTagPeer::NORMALIZED_TAG, $this->normalized_tag);
		if ($this->isColumnModified(QuestionTagPeer::ID)) $criteria->add(QuestionTagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(QuestionTagPeer::DATABASE_NAME);

		$criteria->add(QuestionTagPeer::ID, $this->id);

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

		$copyObj->setUserId($this->user_id);

		$copyObj->setQuestionId($this->question_id);

		$copyObj->setTag($this->tag);

		$copyObj->setName($this->name);

		$copyObj->setName2($this->name2);

		$copyObj->setNormalizedTag($this->normalized_tag);


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
			self::$peer = new QuestionTagPeer();
		}
		return self::$peer;
	}

	
	public function setUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->aUser = $v;
	}


	
	public function getUser($con = null)
	{
		if ($this->aUser === null && ($this->user_id !== null)) {
						include_once 'lib/model/om/BaseUserPeer.php';

			$this->aUser = UserPeer::retrieveByPK($this->user_id, $con);

			
		}
		return $this->aUser;
	}

	
	public function setQuestion($v)
	{


		if ($v === null) {
			$this->setQuestionId(NULL);
		} else {
			$this->setQuestionId($v->getId());
		}


		$this->aQuestion = $v;
	}


	
	public function getQuestion($con = null)
	{
		if ($this->aQuestion === null && ($this->question_id !== null)) {
						include_once 'lib/model/om/BaseQuestionPeer.php';

			$this->aQuestion = QuestionPeer::retrieveByPK($this->question_id, $con);

			
		}
		return $this->aQuestion;
	}

} 