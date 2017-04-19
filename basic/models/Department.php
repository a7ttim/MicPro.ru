<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $department_id
 * @property string $department_name
 * @property integer $parent_department_id
 *
 * @property Department $parentDepartment
 * @property Department[] $departments
 * @property Employment[] $employments
 * @property Project[] $projects
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_department_id'], 'integer'],
            [['department_name'], 'string', 'max' => 100],
            [['parent_department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['parent_department_id' => 'department_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'department_name' => 'Department Name',
            'parent_department_id' => 'Parent Department ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'parent_department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['parent_department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployments()
    {
        return $this->hasMany(Employment::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['department_id' => 'department_id']);
    }
}
