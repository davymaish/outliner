<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutlinerItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'parent_id',
        'user_id',
        'position'
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function ($item) {
            $item->syncToCloud();
        });

        self::updated(function ($item) {
            $item->syncToCloud();
        });
    }

    public function children()
    {
        return $this->hasMany(OutlinerItem::class, 'parent_id');
    }

    public function scopeIsRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    public function isParent()
    {
        return $this->parent_id? false : true;
    }

    public function parent()
    {
        return $this->belongsTo(OutlinerItem::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function syncToCloud()
    {
        if ($this->sync_id) {
            $cloudItem = self::on(config('database.cloud_server'))->where('sync_id', $this->sync_id)->first();

            if ($cloudItem) {
                $cloudItem->update($this->toArray());
            } else {
                self::on(config('database.cloud_server'))->create($this->toArray());
            }
        } else {
            self::on(config('database.cloud_server'))->create($this->toArray());
        }
    }

    public function syncToLocal()
    {
        if ($this->sync_id) {
            $localItem = self::where('sync_id', $this->sync_id)->first();

            if ($localItem) {
                $localItem->update($this->toArray());
            } else {
                self::create($this->toArray());
            }
        }
    }
}

