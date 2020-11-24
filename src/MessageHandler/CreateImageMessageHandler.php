<?php

namespace App\MessageHandler;

use App\Message\CreateImageMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class CreateImageMessageHandler implements MessageHandlerInterface
{
    public function __invoke(CreateImageMessage $message)
    {
        // do something with your message
        echo $message->getName()."\n";
    }
}
