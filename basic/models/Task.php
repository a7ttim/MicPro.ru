<?php
/**
 * Created by PhpStorm.
 * User: amazi
 * Date: 13.04.2017
 * Time: 0:16
 */

namespace app\models;
use yii\db\ActiveRecord;
use app\models\Project;


class Task extends ActiveRecord
{
    public $complete;
    public function  rules(){
        return[[['complete'],'required']];
    }
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }
}
?>