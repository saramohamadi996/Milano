<?php

namespace Milano\Comment\Models;

use Milano\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    const STATUS_NEW = "new";
    const STATUS_APPROVED = "approved";
    const STATUS_REJECTED = "rejected";

    static $statues = [
        self::STATUS_REJECTED,
        self::STATUS_APPROVED,
        self::STATUS_NEW
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function notApprovedComments()
    {
        return $this->hasMany(Comment::class)->where("status", self::STATUS_NEW);
    }

    public function getStatusCssClass()
    {
        if ($this->status == self::STATUS_APPROVED) return "text-success";
        elseif ($this->status == self::STATUS_REJECTED) return "text-error";

        return "text-warning";
    }

}
