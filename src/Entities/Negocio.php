<?php

namespace Preflex\Entities;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'negocios')]
class Negocio
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $description;

    #[ORM\Column(type: 'string')]
    private string $date;

    #[ORM\Column(type: 'string')]
    private string $status;

    #[ORM\Column(type: 'datetime')]
    private DateTime $created;
}
