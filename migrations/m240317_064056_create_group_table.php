<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m240317_064056_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'course_id' => $this->integer()->notNull()->unsigned(),
            'speciality_id' => $this->integer()->notNull()->unsigned(),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'group_number' => $this->integer()->notNull()->unsigned(),
        ]);

        $this->addForeignKey(
            'fk-group-user_id',
            'group',
            'user_id',
            'user',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk-group-course_id',
            'group',
            'course_id',
            'course',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk-group-speciality_id',
            'group',
            'speciality_id',
            'speciality',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group}}');
    }
}
