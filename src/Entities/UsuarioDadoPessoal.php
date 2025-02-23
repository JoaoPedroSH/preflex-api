<?php

namespace Preflex\Entities;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'usuarios_dados_pessoais')]
class UsuarioDadoPessoal
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'integer')]
    private int|null $group_id;

    #[ORM\Column(type: 'string')]
    private string $task;

    #[ORM\Column(type: 'string')]
    private string $date;

    #[ORM\Column(type: 'string')]
    private string $status;

    #[ORM\Column(type: 'datetime')]
    private DateTime $created;
}
