<?php

namespace app\models;

use yii\db\ActiveRecord;

class Tariff extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'price', 'speed'], 'required'],
            [['name', 'description'], 'string'],
            ['price', 'number'],
            ['speed', 'number'],
        ];
    }
}
