<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacancy}}`.
 */
class m240317_063857_create_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacancy}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'title' => $this->string()->notNull()->unique(),
            'description' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'user_id' => $this->integer()->notNull()->unsigned(),
        ]);

        $this->addForeignKey(
            'fk-vacancy-user_id',
            'vacancy',
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
        $this->dropTable('{{%vacancy}}');
    }
}
