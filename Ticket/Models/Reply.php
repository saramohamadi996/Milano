<?php

namespace Milano\Ticket\Models;
use Milano\Media\Models\Media;
use Milano\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Reply extends Model
{

    protected $guarded = [];
    protected $table = "ticket_replies";

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    public function attachmentLink()
    {
        if ($this->media_id)
            return URL::temporarySignedRoute('media.download', now()->addDay(), ['media' => $this->media_id]);
    }
}
