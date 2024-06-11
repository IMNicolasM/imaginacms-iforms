<?php

namespace Modules\Iforms\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Support\Traits\AuditTrait;
use Modules\Isite\Traits\RevisionableTrait;

class Block extends Model
{
    use Translatable, AuditTrait, RevisionableTrait;

    public $transformer = 'Modules\Iforms\Transformers\BlockTransformer';

    public $entity = 'Modules\Iforms\Entities\Block';

    public $repository = 'Modules\Iforms\Repositories\BlockRepository';

    protected $table = 'iforms__blocks';

    public $translatedAttributes = [
        'title',
        'description',
    ];

    protected $fillable = [
        'form_id',
        'sort_order',
        'options',
        'name',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function fields()
    {
        return $this->hasMany(Field::class)->with('translations')->orderBy('order', 'asc');
    }

    public function getOptionsAttribute($value)
    {
        $response = json_decode($value);

        if(is_string($response)) {
          $response = json_decode($response);
        }

        return $response;
    }
}
