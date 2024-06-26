<?php

namespace App\Controller\Admin;

use App\Entity\VetReport;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VetReportCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VetReport::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('animal', 'Nom du sujet'),
            TextField::new('animalFood', 'Alimentation'),
            TextField::new('quantity', 'Ration'),
            TextField::new('quantity', 'Ration'),
            AssociationField::new('healthState', 'état de santé')->setCssClass('text-capitalize'),
            TextEditorField::new('detail', 'Autres détails'),
            AssociationField::new('user', 'Nom du vétérinaire'),
        ];
    }



    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof VetReport) return;
        $entityInstance
            ->setCreatedAt(new \DateTimeImmutable())
        ;
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof VetReport) return;
        $entityInstance
            ->setUpdatedAt(new \DateTimeImmutable())
        ;
        parent::updateEntity($entityManager, $entityInstance); // TODO: Change the autogenerated stub
    }
}
