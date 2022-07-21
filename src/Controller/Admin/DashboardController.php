<?php

namespace App\Controller\Admin;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\MotsCles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {

        // // redirect to some CRUD controller
        // $routeBuilder = $this->get(AdminUrlGenerator::class);

        // return $this->redirect($routeBuilder->setController(ArticlesCrudController::class)->generateUrl());

        // // you can also redirect to different pages depending on the current user
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }
 
        // you can also render some template to display a proper Dashboard
        // // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        // return $this->render('admin/index.html.twig');
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('Gestion du <span class="text-small">Blog</span>')

            // the path defined in this method is passed to the Twig asset() function
            ->setFaviconPath('favicon.svg')

            // // the domain used by default is 'messages'
            // ->setTranslationDomain('my-custom-domain')

            // // there's no need to define the "text direction" explicitly because
            // // its default value is inferred dynamically from the user locale
            // ->setTextDirection('ltr')

            // // set this option if you prefer the page content to span the entire
            // // browser width, instead of the default design which sets a max width
            // ->renderContentMaximized()

            // // set this option if you prefer the sidebar (which contains the main menu)
            // // to be displayed as a narrow column instead of the default expanded design
            // ->renderSidebarMinimized()

            // // by default, all backend URLs include a signature hash. If a user changes any
            // // query parameter (to "hack" the backend) the signature won't match and EasyAdmin
            // // triggers an error. If this causes any issue in your backend, call this method
            // // to disable this feature and remove all URL signature checks
            // ->disableUrlSignatures()

            // // by default, all backend URLs are generated as absolute URLs. If you
            // // need to generate relative URLs instead, call this method
            // ->generateRelativeUrls()
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Articles');
        yield MenuItem::linkToCrud('Articles', 'fas fa-list', Articles::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-book', Categories::class);
        yield MenuItem::linkToCrud('Mots Clés', 'fas fa-key', MotsCles::class);
        yield MenuItem::section('Utilisateurs');

        // return [
            // MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            // MenuItem::section('Blog'),
            // MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
            // MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', BlogPost::class),

            // MenuItem::section('Users'),
            // MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
            // MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        // ];
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName($user->getUsername())
            // use this method if you don't want to display the name of the user
            ->displayUserName(false)

            // you can return an URL with the avatar image
            ->setAvatarUrl('https://...')
            // ->setAvatarUrl($user->getProfileImageUrl())
            // use this method if you don't want to display the user image
            ->displayUserAvatar(false)
            // you can also pass an email address to use gravatar's service
            // ->setGravatarEmail($user->getMainEmailAddress())

            // you can use any type of menu item, except submenus
            ->addMenuItems([
                MenuItem::linkToRoute('My Profile', 'fa fa-id-card', '...', ['...' => '...']),
                MenuItem::linkToRoute('Settings', 'fa fa-user-cog', '...', ['...' => '...']),
                MenuItem::section(),
                MenuItem::linkToLogout('Logout', 'fa fa-sign-out'),
            ]);
    }

}
