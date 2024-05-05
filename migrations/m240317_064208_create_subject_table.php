<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subject}}`.
 */
class m240317_064208_create_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subject}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'activity_id' => $this->integer()->notNull()->unsigned(),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'subject_name' => $this->string(128)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-subject-user_id',
            'subject',
            'user_id',
            'user',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk-subject-activity_id',
            'subject',
            'activity_id',
            'activity',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subject}}');
    }
}
