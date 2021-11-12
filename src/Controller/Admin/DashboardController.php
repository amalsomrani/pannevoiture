<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use App\Entity\Demande;
use App\Entity\Mecancien;
use App\Entity\Panne;
use App\Entity\Publicite;
use App\Entity\Remorquage;
use App\Entity\Service;
use App\Entity\User;
use App\Entity\Vehicule;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Pannevoiture');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('user', 'fas fas-user', User::class);
        yield MenuItem::linkToCrud('remorquage', 'fas fas-list', Remorquage::class);
        yield MenuItem::linkToCrud('mecancien', 'fas fas-list', Mecancien::class);
        yield MenuItem::linkToCrud('Commentaire', 'fas fas-list', Commentaire::class);
        yield MenuItem::linkToCrud('Demande', 'fas fas-list', Demande::class);
        yield MenuItem::linkToCrud('vehicule', 'fas fas-list', Vehicule::class);
        yield MenuItem::linkToCrud('panne', 'fas fas-list', Panne::class);
        yield MenuItem::linkToCrud('Service', 'fas fas-list', Service::class);
        yield MenuItem::linkToCrud('Publicite', 'fas fas-list', Publicite::class);

    }
}
