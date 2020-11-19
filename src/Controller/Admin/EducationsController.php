<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Data\EducationCrudData;
use App\Entity\Education;

/**
 * @Route("/admin/educations", name="admin_educations_")
 */
class EducationsController extends CrudController
{

    protected string $templatePath = 'educations';
    protected string $menuItem = 'education';
    protected string $entity = Education::class;
    protected string $routePrefix = 'admin_educations';

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
        $data = new EducationCrudData();
        $data->entity = new Education();
        return $this->crudNew($data);
    }

    /**
     * @Route("/{id<\d+>}", name="edit", methods={"POST", "GET"})
     */
    public function edit(Education $education): Response
    {
        $data = EducationCrudData::make($education);
        return $this->crudEdit($data);
    }

    /**
     * @Route("/{id<\d+>}", methods={"DELETE"})
     */
    public function delete(Education $education): Response
    {
        return $this->crudDelete($education);
    }
}
