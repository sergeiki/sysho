<?php

namespace App\Controller;

use App\Helper\Menu;
use App\Message\CreateImageMessage;
use App\ModelDBAL\Fetcher;
use Psr\Http\Message\MessageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var Menu
     */
    private $sidebar;
    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(Menu $menu, MessageBusInterface $bus)
    {
        $this->sidebar = $menu;
        $this->bus = $bus;
    }

    /**
     * @Route("/", name="home_index")
     */
    public function index()
    {
        $this->bus->dispatch(new CreateImageMessage('HomeController'));

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'sidebar' => $this->sidebar->getSidebar(),
        ]);
    }
}
