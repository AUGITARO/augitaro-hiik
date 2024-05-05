<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laboratory_work}}`.
 */
class m240317_064301_create_laboratory_work_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%laboratory_work}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'subject_id' => $this->integer()->notNull()->unsigned(),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'file_path' => $this->string(128)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-laboratory_work-user_id',
            'laboratory_work',
            'user_id',
            'user',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk-laboratory_work-subject_id',
            'laboratory_work',
            'subject_id',
            'subject',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%laboratory_work}}');
    }
}
