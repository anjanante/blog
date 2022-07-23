<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<12;$i++){
            $user = new Users();
            // $user->set
            $arcticle = new Articles();
            $arcticle
                ->setTitre('Article '.$i)
                ->setContenu('Contenu de <i>l\'article '.$i.'</i>')
                ->setFeaturedImage('')
                ->setUsers($user);
            $manager->persist($arcticle);
        }
        $manager->flush();
    }
}
