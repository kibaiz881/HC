<?php
Namespace App\DataFixtures; 
use Faker\Factory as FakerFactory;
use App\Entity\Users\Utilisateurs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateursFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    )
    {
        
    }
    public function load(ObjectManager $manager): void
    {
                $utilisateur = new Utilisateurs();
                $faker = FakerFactory::create('fr_FR'); 

                $utilisateur->setEmailUtilisateur("solofo881@gmail.com")
                            ->setFonctionUtilisateur("Administrateur")
                            ->setNomUtilisateur("RASOLOFONIAINA")
                            ->setPrenomUtilisateur("Jean Baptiste")
                            ->setPassword(
                                $this->passwordHasher->hashPassword(
                                    $utilisateur,
                                    'hashpassword'
                                )
                            )
                            ->setRoles(['ROLE_USER'])
                            ->setProfileUtilisateur(null)
                            ->setCreatedAt(new \DateTimeImmutable())
                            ->setUpdatedAt(new \DateTimeImmutable());
                $manager->persist($utilisateur);
                $manager->flush();

                for($i =0; $i<9; $i++){
                    $utilisateur = new Utilisateurs();
                                    $utilisateur->setEmailUtilisateur($faker->email())
                            ->setFonctionUtilisateur($faker->jobTitle())
                            ->setNomUtilisateur($faker->lastName())
                            ->setPrenomUtilisateur($faker->firstName())
                            ->setPassword(
                                $this->passwordHasher->hashPassword(
                                    $utilisateur,
                                    'hashpassword'
                                )
                            )
                            ->setRoles(['ROLE_USER'])
                            ->setProfileUtilisateur(null)
                            ->setCreatedAt(new \DateTimeImmutable())
                            ->setUpdatedAt(new \DateTimeImmutable());
                $manager->persist($utilisateur);
                $manager->flush();
                }
            }
        }