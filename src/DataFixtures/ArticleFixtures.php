<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $article = new Article();
        $article->setTitre('Addiction');
        $article->setTexte('L’addiction au tabac, souvent appelée dépendance tabagique, est un état qui se caractérise par une envie compulsive de consommer du tabac, malgré la connaissance des risques pour la santé et les efforts pour arrêter1. Cette dépendance est complexe car elle implique des aspects physiques, psychologiques et comportementaux12.

        Physiquement, la nicotine contenue dans le tabac crée une dépendance en agissant sur le cerveau. Elle stimule la libération de dopamine, un neurotransmetteur associé à la sensation de plaisir, ce qui renforce le comportement de fumer2.
        
        Psychologiquement, le tabagisme peut être utilisé comme un moyen de gérer le stress, l’anxiété ou d’autres émotions, créant ainsi une dépendance émotionnelle.
        
        Comportementalement, fumer devient une habitude intégrée dans la routine quotidienne, et les rituels associés au fait de fumer, comme la pause-cigarette, peuvent être difficiles à briser.
        
        La dépendance au tabac est considérée comme l’une des plus difficiles à surmonter, mais il existe des traitements et des soutiens disponibles pour aider les personnes à arrêter de fumer, comme les thérapies de remplacement de la nicotine, les médicaments sur ordonnance, et le soutien psychologique ou comportemental. Arrêter de fumer apporte des bénéfices pour la santé à tout âge et à tout stade de la dépendance.');
        $manager->persist($article);

        $manager->flush();
    }
}
