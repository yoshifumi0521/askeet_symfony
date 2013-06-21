<?php

/**
 * Subclass for representing a row from the 'ask_answer' table.
 *
 *
 *
 * @package lib.model
 */
class Answer extends BaseAnswer
{

    //getRelevancyUpのパーセントを取得するためのメソッド
    public function getRelevancyUpPercent()
    {
        $total = $this->getRelevancyUp() + $this->getRelevancyDown();
        return $total ? sprintf('%.0f', $this->getRelevancyUp() * 100 / $total) : 0;
    }

    //getRelevancyDownのパーセントを取得するためのメソッド
    public function getRelevancyDownPercent()
    {
      $total = $this->getRelevancyUp() + $this->getRelevancyDown();
      return $total ? sprintf('%.0f', $this->getRelevancyDown() * 100 / $total) : 0;
    }







}
