<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%suggestion}}`.
 */
class m240317_063822_create_suggestion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%suggestion}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'username' => $this->string(128)->notNull(),
            'email' => $this->string()->notNull(),
            'message' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%suggestion}}');
    }
}
