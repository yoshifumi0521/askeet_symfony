<?php

/**
 * Subclass for representing a row from the 'ask_relevancy' table.
 *
 *
 *
 * @package lib.model
 */
class Relevancy extends BaseRelevancy
{
    //Relevancyのデータが保存したら、Answerのrelevancy_upかrelevancy_downを変える。 トランザクション処理をする。
    public function save($con = null)
    {
        $con = Propel::getConnection();
        try
        {
            //ここからトランザクション処理。
            $con->begin();

            $ret = parent::save();

            // answerテーブルのrelevancyを更新する
            $answer = $this->getAnswer();
            if ($this->getScore() == 1)
            {
                //relevancy_upをプラスする。
                $answer->setRelevancyUp($answer->getRelevancyUp() + 1);
            }
            else
            {
                //relevancy_downをプラスする。
                $answer->setRelevancyDown($answer->getRelevancyDown() + 1);
            }
            $answer->save($con);


            $con->commit();
            //ここまでトランザクション処理。

            return $ret;
        }
        catch (Exception $e)
        {
            $con->rollback();
            throw $e;
        }
    }








}


