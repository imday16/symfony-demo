<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // on instancie un objet du modèle Home
        $home = new Home();
        // on donne des valeurs aux propriétés de l'objet Home
        $home->setTitre('Le Singe drôle');
        $home->setImageName('singedrole.jpg');
        $home->setTexte('Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque ab incidunt veritatis delectus laudantium optio numquam asperiores architecto dolor mollitia praesentium error autem totam odit repellendus commodi perferendis eveniet ipsa nulla distinctio, atque explicabo fugit dolore! Voluptatem recusandae eligendi quod deleniti? Suscipit, assumenda distinctio ab facilis nemo minima, molestiae aut harum autem itaque delectus. Deserunt omnis magni error nam harum nostrum modi ducimus soluta optio ut pariatur exercitationem, architecto fugiat adipisci quas laborum praesentium, et natus consequatur animi eligendi quod quia ipsum? Aperiam tempora quod voluptas odio esse explicabo, officia dolorum quis voluptates numquam nulla molestias, voluptatem illo dolor ipsum alias doloremque officiis iusto aspernatur sequi. Eligendi adipisci suscipit similique repellat nobis cum architecto asperiores, tempora repudiandae pariatur. Eius quis reprehenderit quia odit temporibus laborum repellendus, distinctio exercitationem odio voluptatem animi doloribus? Non fugiat sequi aliquid veritatis? Explicabo sit eveniet odit id adipisci ab, maiores commodi ea vel quod nobis ad animi rerum quia. Laudantium tenetur minima, ipsam deserunt beatae dolorum sit? Optio ipsum, voluptatum aut perferendis facilis ipsam rem dicta accusamus animi magnam laboriosam repellat atque aspernatur praesentium molestias aperiam. Tempora laudantium, consectetur quod quidem, optio sapiente nihil nemo sunt non fugit ullam ut, dolor suscipit temporibus incidunt. Qui nihil possimus dignissimos quas molestiae eligendi itaque sint error commodi! Adipisci earum autem architecto dolor, at aliquam laudantium tempora esse doloremque officia fugit nemo magnam dolorem. Libero, impedit necessitatibus? Tempore dolor quaerat eius explicabo provident nemo laudantium debitis eos? Rerum iure expedita voluptatem excepturi, quaerat ipsum, similique molestias facilis sequi debitis voluptatibus, quidem ad deleniti consequuntur maxime illo beatae praesentium sit eos. Sapiente quaerat quisquam laboriosam perferendis deleniti dignissimos architecto quasi dolorum nostrum qui accusantium et, rem aspernatur iste atque? Quam in sapiente officiis sed iste, quis vitae minus veritatis eligendi dolor, commodi nisi enim accusamus. Suscipit quam saepe quis.');
        $home->setIsActive(1);
        //on mémorise l'objet pour ensuite l'injecter dans la BDD
        $manager->persist($home);
        //on injecte lobjet dans la BDD
        $manager->flush();
    }
}
