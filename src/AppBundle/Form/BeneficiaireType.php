<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use AppBundle\Entity\Photo;
use AppBundle\Form\PhotoType;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class BeneficiaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  )
            ))
            ->add('prenoms', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  )
            ))
            //->add('slug')
            ->add('naissance', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required'  => false
            ))
            ->add('sexe', ChoiceType::class, array(
                'choices' => array(
                  'Homme' => 'M',
                  'Femme' => 'F'
                ),
                'required'  => true,
                'placeholder' => 'Choisir le sexe',
                'empty_data' => null
            ))
            ->add('nationalite', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  )
            ))
            //->add('matricule')
            ->add('domicile', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  )
            ))
            ->add('flotte', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required'  => false
            ))
            ->add('telephone', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required'  => false
            ))
            ->add('famille', ChoiceType::class, array(
                'choices' => array(
                  'Celibataire' => 'Celibataire',
                  'Marié(e)'  =>  'Marié',
                  'Divorcé(e)' => 'Divorcé',
                  'Veuf/veuve'  =>  'Veuf/veuve'
                ),
                'placeholder'  => 'Choisir la situation matrimoniale'
            ))
            ->add('enfant', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required'  => false
            ))
            ->add('professionnel', ChoiceType::class, array(
                'choices' => array(
                  'Employé(e)'  => 'Employé',
                  'Sans emploi'  =>  'Sans emploi',
                  'Autres'  =>  'Autres'
                ),
                'required'  => false,
                'placeholder'=> 'Votre situation professionnelle',
                'empty_data'  => null,
                'attr'  => array(
                    'class' => 'form-control',
                    'autocomplete'  => 'off'
                )
            ))
            ->add('fonction', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required'  => false
            ))
            ->add('bancaire')
            ->add('banque', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required'  => false
            ))
            ->add('dateouverture', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required'  => false
            ))
            ->add('vague', ChoiceType::class, array(
                'choices' => array(
                  'Vague 1'  => '1',
                  'Vaque 2'  =>  '2',
                  'Vague 3'  =>  '3',
                  'Vague 4'  => '4',
                  'Vaque 5'  =>  '5',
                  'Vague 6'  =>  '6',
                  'Vague 7'  => '7',
                  'Vaque 8'  =>  '8',
                  'Vague 9'  =>  '9',
                ),
                'required'  => true
            ))
            ->add('projet', TextareaType::class, array(
                  'attr'  => array(
                      'class' => 'form-control'
                  ),
                  'required' => 'true'
            ))
            ->add('entreprise', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  )
            ))
            ->add('activite')
            ->add('dateactivite', TextType::class, array(
                  'attr'  => array(
                      'class' => 'form-control',
                      'autocomplete'  => 'off'
                  ),
                  'required'  => false
            ))
            //->add('inscriptionAt')->add('modificationAt')->add('inscritPar')->add('modifiePar')
            ->add('user', UserType::class)
            ->add('zone')
            ->add('domaine')
            ->add('photo', PhotoType::class)
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Beneficiaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_beneficiaire';
    }


}
