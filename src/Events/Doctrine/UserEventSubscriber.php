<?php


namespace App\Events\Doctrine;

use App\Interfaces\UserInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class UserEventListener extends BaseEventSubscriber
{

    public function prePersist(LifecycleEventArgs $args): void
    {
        parent::prePersist($args);

        /** @var UserInterface $user */
        $user = $args->getObject();
        $this->handle_password($user);
        $this->handle_api_key($user);
        
    }

    private function handle_password(UserInterface $user){
        $plain = $user->getPassword();
        if ($plain) {
            $user->setPassword($this->pw->encodePassword($user, $plain));
        }
    }
    private function handle_api_key(UserInterface $user){
        $plain = $user->getPassword();
        if ($plain) {
            $apikey = \md5("@im-api-key-{$plain}");
            $user->setApiKey($apikey);
        }
    }
}