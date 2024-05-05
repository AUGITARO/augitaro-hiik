<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activity}}`.
 */
class m240317_064153_create_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activity}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'activity_name' => $this->string(128)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-activity-user_id',
            'activity',
            'user_id',
            'user',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%activity}}');
    }
}
