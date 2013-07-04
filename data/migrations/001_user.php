<?php

/**
 * Migrations between versions 000 and 001.
 */
class Migration001 extends sfMigration
{
  /**
   * Migrate up to version 001.
   */
  public function up()
  {
    $this->loadSql(dirname(__FILE__).'/001_user.sql');
  }

  /**
   * Migrate down to version 000.
   */
  public function down()
  {
    $this->executeSQL('SET FOREIGN_KEY_CHECKS=0');
    
    $this->executeSQL('DROP TABLE ask_question');
    $this->executeSQL('DROP TABLE ask_answer');
    $this->executeSQL('DROP TABLE ask_user');
    $this->executeSQL('DROP TABLE ask_interest');
    $this->executeSQL('DROP TABLE ask_relevancy');
    
    $this->executeSQL('SET FOREIGN_KEY_CHECKS=1');
  }
}
