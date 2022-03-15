<?php

namespace App\EventListener;
use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;


class AuthenticationSuccessListener{

  /**
    * @param AuthenticationSuccessEvent $event
  */
  public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
  {
    $data = $event->getData();
    $user = $event->getUser();

    if (!$user instanceof UserInterface) {
        return;
    }

    $data['data'] = array(
        'roles' => $user->getRoles(),
        'id' => $user->getId(), 
        'nom' => $user->getNom(),
        'prenom' => $user->getPrenom(),
        'email'=> $user->getEmail(),
        'date_de_naissance' => $user->getDateDeNaissance(),
        'adresse_region' => $user->getAdresseRegion(),
        'adresse_Ville' => $user->getAdresseVille(),
        'adresse_CP' => $user->getAdresseCP(),

    );

    $event->setData($data);
  }
}
        

     