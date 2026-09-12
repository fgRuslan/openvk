<?php

declare(strict_types=1);

namespace openvk\Web\Models\Entities\Notifications;

use openvk\Web\Models\Entities\{User, Post};

final class RepostNotification extends Notification
{
    protected $actionCode = 1;
    protected $threshold  = 120;

    public function __construct(User $recipient, Post $post, User $reposter, Post $repost)
    {
        parent::__construct($recipient, $post, $reposter, time(), json_encode([
            "id" => $repost->getVirtualId(),
            "owner_id" => $repost->getWallOwner()->getRealId(),
            "text" => ovk_proc_strtr(strip_tags($repost->getText()), 400),
        ], JSON_THROW_ON_ERROR));
    }
}
