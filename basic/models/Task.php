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
use app\models\Project;


class Task extends ActiveRecord
{
    public $complete;
    public function  rules(){
        return[[['complete'],'required']];
    }
=======

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $task_id
 * @property string $name
 * @property integer $project_id
 * @property integer $user_id
 * @property string $description
 * @property integer $parent_task_id
 * @property integer $previous_task_id
 * @property string $start_date
 * @property string $plan_end_date
 * @property string $fact_end_date
 * @property integer $employment_percentage
 * @property integer $status
 * @property integer $complete_percentage
 *
 * @property Comment[] $comments
 * @property Project $project
 * @property User $user
 * @property Task $parentTask
 * @property Task[] $tasks
 * @property Task $previousTask
 * @property Task[] $tasks0
 * @property TaskStatus $status0
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'project_id', 'user_id'], 'required'],
            [['project_id', 'user_id', 'parent_task_id', 'previous_task_id', 'employment_percentage', 'status', 'complete_percentage'], 'integer'],
            [['start_date', 'plan_end_date', 'fact_end_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 5000],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            [['parent_task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['parent_task_id' => 'task_id']],
            [['previous_task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['previous_task_id' => 'task_id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TaskStatus::className(), 'targetAttribute' => ['status' => 'task_status_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'name' => 'Name',
            'project_id' => 'Project ID',
            'user_id' => 'User ID',
            'description' => 'Description',
            'parent_task_id' => 'Parent Task ID',
            'previous_task_id' => 'Previous Task ID',
            'start_date' => 'Start Date',
            'plan_end_date' => 'Plan End Date',
            'fact_end_date' => 'Fact End Date',
            'employment_percentage' => 'Employment Percentage',
            'status' => 'Status',
            'complete_percentage' => 'Complete Percentage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['task_id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
>>>>>>> CRUD added for new DB
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }
<<<<<<< HEAD
}
?>
=======

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentTask()
    {
        return $this->hasOne(Task::className(), ['task_id' => 'parent_task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['parent_task_id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreviousTask()
    {
        return $this->hasOne(Task::className(), ['task_id' => 'previous_task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks0()
    {
        return $this->hasMany(Task::className(), ['previous_task_id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TaskStatus::className(), ['task_status_id' => 'status']);
    }
}
>>>>>>> CRUD added for new DB
