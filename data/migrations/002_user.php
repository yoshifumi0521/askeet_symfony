<?php

/**
 * Migrations between versions 001 and 002.
 */
class Migration002 extends sfMigration
{
  /**
   * Migrate up to version 002.
   */
  public function up()
  {
    $this->executeSQL("CREATE TABLE TEST(test_id nchar(6))");

  }

  /**
   * Migrate down to version 001.
   */
  public function down()
  {

  }
}
