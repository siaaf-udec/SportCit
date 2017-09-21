<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class SongForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Nombre',
                'attr' => ['autofocus'],
            ])
            ->add('nme', 'text', [
                'label' => 'Mancha',
                'attr' => ['autofocus'],
            ])
            ->add('lyrics', 'textarea')
            ->add('publish', 'checkbox')
            ->add('languages', 'select', [
                'choices' => ['en' => 'English', 'fr' => 'French'],
                'selected' => 'en',
                'empty_value' => '=== Select language ==='
            ]);
    }
}
