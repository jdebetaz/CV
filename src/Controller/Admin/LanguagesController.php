<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Data\LanguageCrudData;
use App\Entity\Language;

/**
 * @Route("/admin/languages", name="admin_languages_")
 */
class LanguagesController extends CrudController
{

    protected string $templatePath = 'languages';
    protected string $menuItem = 'language';
    protected string $entity = Language::class;
    protected string $routePrefix = 'admin_languages';

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $query = $this->getRepository()
            ->createQueryBuilder('row')
            ->orderBy('row.title', 'ASC');
        return $this->crudIndex($query);
    }

    /**
     * @Route("/new", name="new", methods={"POST", "GET"})
     */
    public function new(): Response
    {
        $data = new LanguageCrudData();
        $data->entity = new Language();
        return $this->crudNew($data);
    }

    /**
     * @Route("/{id<\d+>}", name="edit", methods={"POST", "GET"})
     */
    public function edit(Language $language): Response
    {
        $data = LanguageCrudData::make($language);
        return $this->crudEdit($data);
    }

    /**
     * @Route("/{id<\d+>}", methods={"DELETE"})
     */
    public function delete(Language $language): Response
    {
        return $this->crudDelete($language);
    }
}
