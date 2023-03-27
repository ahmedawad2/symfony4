<?php

namespace App\Controller\dummy;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DummyController1
{
    /**
     * @Route("/welcome/{username}", name="welcome", methods={"Get"})
     * @param string $username
     * @return Response
     */
    public function welcomeGET(string $username): Response
    {
        return new Response(sprintf('Welcome To the App %s', $username));
    }

    /**
     * @Route("/welcome", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function welcomePOST(Request $request): Response
    {
        $username = json_decode($request->getContent(), true)['username'];
        return new Response(sprintf('Welcome To the App %s', $username));
    }
}