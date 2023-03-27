<?php

namespace App\Controller\dummy;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DummyController1 extends AbstractController
{
    /**
     * @Route("/welcome/{username}", name="welcome1", methods={"Get"})
     * @param string $username
     * @return Response
     */
    public function welcomeGET(string $username): Response
    {
        return $this->getWelcomeMessage($username);
    }

    /**
     * @Route("/welcome", methods={"POST"}, name="welcome2")
     * @param Request $request
     * @return Response
     *
     */
    public function welcomePOST(Request $request): Response
    {
        $username = json_decode($request->getContent(), true)['username'];
        return $this->getWelcomeMessage($username);
    }

    /**
     * @Route("/welcomeWithFormParams", methods={"POST"}, name="welcome3")
     * @param Request $request
     * @return Response
     */
    public function welcomeWithFormParams(Request $request): Response
    {
        $username = $request->get('username');
        return $this->getWelcomeMessage($username);
    }

    /**
     * @Route("/welcomeWithTwig/{username}", methods={"GET"}, name="welcomeWithTwig")
     * @param string $username
     * @return Response
     */
    public function welcomeWithTwig(string $username): Response
    {
        return $this->render('dummy/welcome.html.twig', compact('username'));
    }

    private function getWelcomeMessage(string $username): Response
    {
        return new Response(sprintf('Welcome To the App %s', $username));
    }
}