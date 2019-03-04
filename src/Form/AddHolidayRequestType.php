<?php

namespace App\Form;


use App\Entity\BusinessUnit;
use App\Entity\Employee;
use App\Entity\Responsible;
use App\Form\Action\AddHolidayRequestAction;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class AddHolidayRequestType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add("employee", EntityType::class, ["class" => Employee::class, "choice_value" => "name"]);
        $builder->add("start", DateTimeType::class, ["widget" => "single_text", "format" => "yyyy-MM-dd"]);
        $builder->add("end", DateTimeType::class, ["widget" => "single_text", "format" => "yyyy-MM-dd"]);
        $builder->add("businessUnit", EntityType::class, ["class" => BusinessUnit::class, "choice_value" => "name"]);
        $builder->add("note", TextType::class);
        $builder->add("responsible1", EntityType::class, ["class" => Responsible::class, "choice_value" => "name"]);
        $builder->add("responsible2", EntityType::class, ["class" => Responsible::class, "choice_value" => "name"]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefault("data_class", AddHolidayRequestAction::class);
    }
}