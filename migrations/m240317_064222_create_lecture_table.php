<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lecture}}`.
 */
class m240317_064222_create_lecture_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lecture}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'subject_id' => $this->integer()->notNull()->unsigned(),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'file_path' => $this->string(128)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-lecture-user_id',
            'lecture',
            'user_id',
            'user',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk-lecture-subject_id',
            'lecture',
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
        $this->dropTable('{{%lecture}}');
    }
}
