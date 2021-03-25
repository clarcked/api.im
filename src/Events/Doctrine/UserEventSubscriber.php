<?php


namespace App\Events\Doctrine;

use App\Interfaces\UserInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class UserEventSubscriber extends BaseEventSubscriber
{

    public function prePersist(LifecycleEventArgs $args): void
    {
        parent::prePersist($args);
        $user = $args->getObject();
        if($user instanceof UserInterface) {
            $this->handle_password($user);
            $this->handle_api_key($user);
            $this->handle_public_key($user);
        }
    }

    private function handle_password(UserInterface $user)
    {
        $plain = $user->getPassword();
        if ($plain) {
            $user->setPassword($this->pw->encodePassword($user, $plain));
        }
    }

    private function handle_api_key(UserInterface $user)
    {
        $plain = $user->getPassword();
        if ($plain) {
            $user->setApiKey(\md5("@im-private-{$plain}"));
        }
    }

    private function handle_public_key(UserInterface $user)
    {
        $username = $user->getUsername();
        $email = $user->getEmail();
        $user->setPublicKey(\md5("public:$username:$email"));
    }
}