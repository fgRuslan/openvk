<?php

declare(strict_types=1);

namespace openvk\Web\Models\Entities\Notifications;

use openvk\Web\Models\Entities\{Comment, Postable, User};

final class MentionNotification extends Notification
{
    protected $actionCode = 4;

    public function __construct(User $recipient, User $mentioner, Postable $discussionHost, string $quote = "", ?Comment $comment = null)
    {
        parent::__construct($recipient, $comment ?? $mentioner, $discussionHost, time(), $quote);
    }
}
