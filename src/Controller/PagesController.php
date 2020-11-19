<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ExperienceRepository;
use App\Repository\EducationRepository;
use App\Repository\GroupRepository;
use App\Repository\LanguageRepository;
use App\Repository\CategoryRepository;
use App\Repository\AwardRepository;

class PagesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(AwardRepository $awardRepository, ExperienceRepository $experienceRepository, EducationRepository $educationRepository, GroupRepository $groupRepository, LanguageRepository $languageRepository, CategoryRepository $categoryRepository): Response
    {
        $experiences = $experienceRepository->findAll();
        $educations = $educationRepository->findAll();
        $group = $groupRepository->findOneBy(['slug' => 'web']);
        $languages = $languageRepository->findAll();
        $hobbies = $categoryRepository->findBy(['type' => 'hobby']);
        $awards = $awardRepository->findAll();

        return $this->render('pages/index.html.twig', [
            "awards" => $awards,
            "experiences" => $experiences,
            "educations" => $educations,
            "languages" => $languages,
            "hobbies" => $hobbies,
            "group" => $group,
            "today" => date("Y-m-d")
        ]);
    }

    /**
     * @Route("/cv/{slug}", name="cv")
     */
    public function show(string $slug, AwardRepository $awardRepository, ExperienceRepository $experienceRepository, EducationRepository $educationRepository, GroupRepository $groupRepository, LanguageRepository $languageRepository, CategoryRepository $categoryRepository): Response
    {
        $experiences = $experienceRepository->findAll();
        $educations = $educationRepository->findAll();
        $group = $groupRepository->findOneBy(['slug' => $slug]);
        $languages = $languageRepository->findAll();
        $hobbies = $categoryRepository->findBy(['type' => 'hobby']);
        $awards = $awardRepository->findAll();

        return $this->render('pages/index.html.twig', [
            "awards" => $awards,
            "experiences" => $experiences,
            "educations" => $educations,
            "languages" => $languages,
            "hobbies" => $hobbies,
            "group" => $group,
            "today" => date("Y-m-d")
        ]);
    }
}
