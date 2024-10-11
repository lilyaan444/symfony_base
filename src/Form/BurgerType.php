<?php

namespace App\Form;

use App\Entity\Burger;
use App\Entity\Pain;
use App\Entity\Sauce;
use App\Entity\Oignon; // Assuming you have an Oignon entity
use App\Entity\Image; // Assuming you have an Image entity
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BurgerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add
('name', TextType::class, [
                'label' => 'Nom du Burger',
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix',
                'currency' => 'EUR', // Adjust currency as needed
            ])
            ->add('pain', EntityType::class, [
                'class' => Pain::class,
                'choice_label' => 'name', // Assuming your Pain entity has a 'name' property
                'label' => 'Type de Pain',
            ])
            ->add('oignons', EntityType::class, [
                'class' => Oignon::class, // Use your actual Oignon entity class
                'choice_label' => 'name', // Assuming your Oignon entity has a 'name' property
                'label' => 'Type d\'Oignons',
                'multiple' => true, // If you allow multiple onion selections
                'expanded' => true, // If you want checkboxes instead of a dropdown
            ])
            ->add('sauces', EntityType::class, [
                'class' => Sauce::class,
                'choice_label' => 'name', // Assuming your Sauce entity has a 'name' property
                'label' => 'Sauces',
                'multiple' => true, // If you allow multiple sauce selections
                'expanded' => true, // If you want checkboxes instead of a dropdown
            ])
            ->add('image', EntityType::class, [
                'class' => Image::class,
                'choice_label' => 'name', // ou 'url' selon ce que vous voulez afficher comme label
                'choice_attr' => function (Image $image) {
                    return ['data-image-url' => $image->getUrl()];
                },
                'attr' => ['data-image-preview-target' => 'select', 'data-action' => 'change->image-preview#preview'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Burger::class,
        ]);
    }
}
