<?php

use yii\db\Migration;

/**
 * Class m180624_102337_create_transction_paypal
 */
class m180624_102337_create_transction_paypal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180624_102337_create_transction_paypal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180624_102337_create_transction_paypal cannot be reverted.\n";

        return false;
    }
    */

    public function up()
    {
        $this->createTable('transaction_paypal', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'payment_id' => $this->string(100),
            'hash' => $this->string(100),
            'complete' => $this->integer(1),
            'create_time' => $this->string(50),
            'update_time' => $this->string(50),
            'product_id' => $this->integer(11)
        ]);
    }

    public function down()
    {
        $this->dropTable('transaction_paypal');
    }
}
