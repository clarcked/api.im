<?php


namespace App\Events\Doctrine;


use App\Entity\Master\Project;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class ProjectEventSubscriber extends BaseEventSubscriber
{
    public function prePersist(LifecycleEventArgs $args): void
    {
        parent::prePersist($args);
        $project = $args->getObject();
        if ($project instanceof Project) {
            $this->createDatabaseForProject($project->getName(), $project->getCategory()->getName());
        }
    }

    public function createDatabaseForProject(string $name, string $template = "commerce")
    {
        $sql = "CREATE DATABASE :database WITH TEMPLATE :template OWNER root";
        $res = $this->em->createQuery($sql)
            ->setParameter('database', $name)
            ->setParameter('template', $template)
            ->getResult();
        $this->logger->debug($res);
        return $res;
    }
}