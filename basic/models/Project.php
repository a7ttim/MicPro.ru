<?php
/**
 * Created by PhpStorm.
 * User: amazi
 * Date: 13.04.2017
 * Time: 0:16
 */

namespace app\models;
use yii\db\ActiveRecord;
use app\models\Task;


class Project extends ActiveRecord
{
    public $project_id;
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'project_id']);
    }
}

?>