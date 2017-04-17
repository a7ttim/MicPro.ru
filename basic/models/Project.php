<?php
<<<<<<< HEAD
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
=======

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $project_id
 * @property string $project_name
 * @property string $project_date
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_name', 'project_date'], 'required'],
            [['project_date'], 'safe'],
            [['project_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'project_name' => 'Project Name',
            'project_date' => 'Project Date',
        ];
    }
}
>>>>>>> CRUD added
