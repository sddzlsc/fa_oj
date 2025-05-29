<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Questions extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'questions';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'integer';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [
        'typedata_text',
        'diffdata_text'
    ];
    

    
    public function getTypedataList()
    {
        return ['1' => __('Typedata 1'), '2' => __('Typedata 2'), '3' => __('Typedata 3'), '4' => __('Typedata 4'), '5' => __('Typedata 5')];
    }

    public function getDiffdataList()
    {
        return ['1' => __('Diffdata 1'), '2' => __('Diffdata 2'), '3' => __('Diffdata 3'), '4' => __('Diffdata 4'), '5' => __('Diffdata 5')];
    }


    public function getTypedataTextAttr($value, $data)
    {
        $value = $value ?: ($data['typedata'] ?? '');
        $list = $this->getTypedataList();
        return $list[$value] ?? '';
    }


    public function getDiffdataTextAttr($value, $data)
    {
        $value = $value ?: ($data['diffdata'] ?? '');
        $list = $this->getDiffdataList();
        return $list[$value] ?? '';
    }




    public function cource()
    {
        return $this->belongsTo('Cource', 'cource_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
