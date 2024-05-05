<?php

use yii\db\Migration;

/**
 * Class m240505_043030_update_event_table
 */
class m240505_043030_update_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('event', 'image_path', $this->string()->notNull()->after('date'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('event', 'image_path');
    }

}
