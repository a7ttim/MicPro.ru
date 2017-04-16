<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projects`.
 */
class m170416_055020_create_projects_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('projects', [
            'project_id' => $this->primaryKey(),
            'project_name' => $this->string()->notNull(),
            'project_date' => $this->dateTime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('projects');
    }
}
