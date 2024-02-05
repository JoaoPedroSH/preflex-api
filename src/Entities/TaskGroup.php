<?php

namespace TasksManager\Entities;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'tasks_groups')]
class TaskGroup
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $description;

    #[ORM\Column(type: 'datetime')]
    private DateTime $created;

    #[ORM\Column(type: 'string')]
    private string $status;
}
