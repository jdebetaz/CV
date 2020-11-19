<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Data\AwardCrudData;
use App\Entity\Award;

/**
 * @Route("/admin/awards", name="admin_awards_")
 */
class AwardsController extends CrudController
{

    protected string $templatePath = 'awards';
    protected string $menuItem = 'award';
    protected string $entity = Award::class;
    protected string $routePrefix = 'admin_awards';

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $query = $this->getRepository()
            ->createQueryBuilder('row')
            ->orderBy('row.recievedAt', 'DESC');
        return $this->crudIndex($query);
    }

    /**
     * @Route("/new", name="new", methods={"POST", "GET"})
     */
    public function new(): Response
    {
        $data = new AwardCrudData();
        $data->entity = new Award();
        return $this->crudNew($data);
    }

    /**
     * @Route("/{id<\d+>}", name="edit", methods={"POST", "GET"})
     */
    public function edit(Award $award): Response
    {
        $data = AwardCrudData::make($award);
        return $this->crudEdit($data);
    }

    /**
     * @Route("/{id<\d+>}", methods={"DELETE"})
     */
    public function delete(Award $award): Response
    {
        return $this->crudDelete($award);
    }
}
