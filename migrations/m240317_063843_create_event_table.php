<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 */
class m240317_063843_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'title' => $this->string()->notNull()->unique(),
            'description' => $this->text()->notNull(),
            'date' => $this->date()->notNull()->comment('Когда состоится мероприятие'),
            'user_id' => $this->integer()->notNull()->unsigned(),
        ]);

        $this->addForeignKey(
            'fk-event-user_id',
            'event',
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
        $this->dropTable('{{%event}}');
    }
}
