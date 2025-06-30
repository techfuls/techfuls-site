<?php
namespace App\Controller;

use League\CommonMark\CommonMarkConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'test_markdown')]
    public function markdown(): Response
    {
        $file = __DIR__.'/../../content/intro.md';
        $markdown = file_exists($file) ? file_get_contents($file) : '# Fichier introuvable';

        $converter = new CommonMarkConverter();
        $html = $converter->convertToHtml($markdown);

        return $this->render('test/markdown.html.twig', [
            'content' => $html,
        ]);
    }
}
