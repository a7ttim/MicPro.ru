<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Task;

/**
 * TaskSearch represents the model behind the search form about `app\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'project_id', 'user_id', 'parent_task_id', 'previous_task_id', 'employment_percentage', 'status', 'complete_percentage'], 'integer'],
            [['name', 'description', 'start_date', 'plan_end_date', 'fact_end_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Task::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'task_id' => $this->task_id,
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
            'parent_task_id' => $this->parent_task_id,
            'previous_task_id' => $this->previous_task_id,
            'start_date' => $this->start_date,
            'plan_end_date' => $this->plan_end_date,
            'fact_end_date' => $this->fact_end_date,
            'employment_percentage' => $this->employment_percentage,
            'status' => $this->status,
            'complete_percentage' => $this->complete_percentage,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
