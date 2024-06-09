<?php

use yii\db\Migration;

/**
 * Class m240609_061706_update_vacancy_table
 */
class m240609_061706_update_vacancy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('vacancy', 'tel', $this->string()->notNull()->after('email'));
        $this->addColumn('vacancy', 'address', $this->string()->notNull()->after('tel'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('vacancy', 'tel');
        $this->dropColumn('vacancy', 'address');
    }

}
