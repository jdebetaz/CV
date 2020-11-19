<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Data\ExperienceCrudData;
use App\Entity\Experience;

/**
 * @Route("/admin/experiences", name="admin_experiences_")
 */
class ExperiencesController extends CrudController
{

    protected string $templatePath = 'experiences';
    protected string $menuItem = 'experience';
    protected string $entity = Experience::class;
    protected string $routePrefix = 'admin_experiences';

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->crudIndex();
    }

    /**
     * @Route("/new", name="new", methods={"POST", "GET"})
     */
    public function new(): Response
    {
        $data = new ExperienceCrudData();
        $data->entity = new Experience();
        return $this->crudNew($data);
    }

    /**
     * @Route("/{id<\d+>}", name="edit", methods={"POST", "GET"})
     */
    public function edit(Experience $experience): Response
    {
        $data = ExperienceCrudData::make($experience);
        return $this->crudEdit($data);
    }

    /**
     * @Route("/{id<\d+>}", methods={"DELETE"})
     */
    public function delete(Experience $experience): Response
    {
        return $this->crudDelete($experience);
    }
}
