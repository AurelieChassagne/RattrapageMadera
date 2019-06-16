<?php

use Symfony\Component\HttpFoundation\Request;
use Projet_web\Domain\Clients;
use Projet_web\Domain\Devis;
use Projet_web\Domain\Professeurs;
use Projet_web\Domain\Utilisateurs;
use Projet_web\Domain\Materiaux;
use Projet_web\Form\Type\UtilisateursType;
use Projet_web\Form\Type\ProfesseursType;
use Projet_web\Form\Type\MateriauxType;
use Projet_web\Form\Type\ClientsType;
use Projet_web\Form\Type\DevisType;

//route appelée de base : authentification
$app->get('/', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('home');

// Login 
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');



// --------------------- Section Materiaux --------------------

//Renvoie la page des Materiaux  
$app->get('/materiaux', function () use ($app) {
   
    $materiaux = $app['dao.materiaux']->findAll();

    //on affiche la page avec un tableau de materiaux    
    return $app['twig']->render('materiaux.html.twig', array(
        'materiaux' => $materiaux));
})->bind('materiaux');


// Ajouter une nouveau materiel
$app->match('/admin/materiaux/add', function(Request $request) use ($app) {
    $materiel = new Materiaux();
    $materielForm = $app['form.factory']->create(new MateriauxType(), $materiel);
    $materielForm->handleRequest($request);

    //Si la demande a été soumise (formulaire rempli) on enregistre puis on redirige sur la page materiel
    if ($materielForm->isSubmitted() && $materielForm->isValid()) {
        $app['dao.materiaux']->save($materiel);
        $app['session']->getFlashBag()->add('success', 'Le matériel a été créé avec succès.');
        return $app->redirect($app['url_generator']->generate('materiaux'));
    }
    //On affiche le formulaire de materiel 
    return $app['twig']->render('materiaux_form.html.twig', array(
        'title' => 'Nouveau materiel',
        'materielForm' => $materielForm->createView()));
})->bind('admin_materiaux_add');


// Editer un materiel existant
$app->match('/admin/materiaux/{ref}/edit', function($ref, Request $request) use ($app) {
    $materiel = $app['dao.materiaux']->find($ref);
    $materielForm = $app['form.factory']->create(new MateriauxType(), $materiel);
    $materielForm->handleRequest($request);

    //Si la demande a été soumise on enregistre puis on redirige sur la page des materiaux
    if ($materielForm->isSubmitted() && $materielForm->isValid()) {
        $app['dao.materiaux']->save($materiel);
        $app['session']->getFlashBag()->add('success', 'Le materiel a été modifié avec succès.');
        return $app->redirect($app['url_generator']->generate('materiaux'));
    }

    //On affiche par defaut le formulaire de materiel rempli avec les données du materiaux
    return $app['twig']->render('materiaux_form.html.twig', array(
        'title' => 'Editer un materiel',
        'materielForm' => $materielForm->createView()));
})->bind('admin_materiaux_edit');


// Supprimer un materiel
$app->get('/admin/materiaux/{ref}/delete', function($ref, Request $request) use ($app) {
    // Supprimer le materiel
    $app['dao.materiaux']->delete($ref);
    $app['session']->getFlashBag()->add('success', 'Le materiel a été supprimé avec succès.');
    // Redirection sur la page des materiaux
    return $app->redirect($app['url_generator']->generate('materiaux'));
})->bind('admin_materiaux_delete');


// Afficher le détail d'un materiel 
$app->get('/materiaux/{ref}', function ($ref, Request $request) use ($app) {
    $materiaux = $app['dao.materiaux']->find($ref);
    return $app['twig']->render('materiel.html.twig', array(
        'materiaux' => $materiaux));
})->bind('materiel');


// --------------------- Section Clients -------------------- 

//Renvoie la page des Clients  
$app->get('/clients', function () use ($app) {
   
    $clients = $app['dao.clients']->findAll();

    //on affiche la page avec un tableau de clients    
    return $app['twig']->render('clients.html.twig', array(
        'clients' => $clients));
})->bind('clients');


// Ajouter une nouveau client
$app->match('/admin/clients/add', function(Request $request) use ($app) {
    $client = new Clients();
    $clientForm = $app['form.factory']->create(new ClientsType(), $client);
    $clientForm->handleRequest($request);

    //Si la demande a été soumise (formulaire rempli) on enregistre puis on redirige sur la page client
    if ($clientForm->isSubmitted() && $clientForm->isValid()) {
        $app['dao.clients']->save($client);
        $app['session']->getFlashBag()->add('success', 'Le client a été créé avec succès.');
        return $app->redirect($app['url_generator']->generate('clients'));
    }
    //On affiche le formulaire de client 
    return $app['twig']->render('client_form.html.twig', array(
        'title' => 'Nouveau client',
        'clientForm' => $clientForm->createView()));
})->bind('admin_clients_add');


// Editer un client existant
$app->match('/admin/clients/{ref}/edit', function($ref, Request $request) use ($app) {
    $client = $app['dao.clients']->find($ref);
    $clientForm = $app['form.factory']->create(new ClientsType(), $client);
    $clientForm->handleRequest($request);

    //Si la demande a été soumise on enregistre puis on redirige sur la page des clients
    if ($clientForm->isSubmitted() && $clientForm->isValid()) {
        $app['dao.clients']->save($client);
        $app['session']->getFlashBag()->add('success', 'Le client a été modifié avec succès.');
        return $app->redirect($app['url_generator']->generate('clients'));
    }

    //On affiche par defaut le formulaire de client rempli avec les données du clients
    return $app['twig']->render('client_form.html.twig', array(
        'title' => 'Editer un client',
        'clientForm' => $clientForm->createView()));
})->bind('admin_clients_edit');


// Supprimer un client
$app->get('/admin/clients/{ref}/delete', function($ref, Request $request) use ($app) {
    // Supprimer le client
    $app['dao.clients']->delete($ref);
    $app['session']->getFlashBag()->add('success', 'Le client a été supprimé avec succès.');
    // Redirection sur la page des client
    return $app->redirect($app['url_generator']->generate('clients'));
})->bind('admin_clients_delete');


// Afficher le détail d'un client 
$app->get('/clients/{ref}', function ($ref, Request $request) use ($app) {
    $clients = $app['dao.clients']->find($ref);
    return $app['twig']->render('client.html.twig', array(
        'clients' => $clients));
})->bind('client');

// --------------------- Section Devis --------------------


//Renvoie la page des Devis  
$app->get('/devis', function () use ($app) {
   
    $devis = $app['dao.devis']->findAll();

    //on affiche la page avec un tableau de devis    
    return $app['twig']->render('devis.html.twig', array(
        'devis' => $devis));
})->bind('devis');


// Ajouter une nouveau devis
$app->match('/admin/devis/add', function(Request $request) use ($app) {
    $devi = new Devis();
    $deviForm = $app['form.factory']->create(new DevisType(), $devi);
    $deviForm->handleRequest($request);

    //Si la demande a été soumise (formulaire rempli) on enregistre puis on redirige sur la page devis
    if ($deviForm->isSubmitted() && $deviForm->isValid()) {
        $app['dao.devis']->save($devi);
        $app['session']->getFlashBag()->add('success', 'Le devis a été créé avec succès.');
        return $app->redirect($app['url_generator']->generate('devis'));
    }
    //On affiche le formulaire de devis 
    return $app['twig']->render('devi_form.html.twig', array(
        'title' => 'Nouveau devis',
        'deviForm' => $deviForm->createView()));
})->bind('admin_devis_add');


// Editer un devis existant
$app->match('/admin/devis/{ref}/edit', function($ref, Request $request) use ($app) {
    $devi = $app['dao.devis']->find($ref);
    $deviForm = $app['form.factory']->create(new DevisType(), $devi);
    $deviForm->handleRequest($request);

    //Si la demande a été soumise on enregistre puis on redirige sur la page des devis
    if ($deviForm->isSubmitted() && $deviForm->isValid()) {
        $app['dao.devis']->save($devi);
        $app['session']->getFlashBag()->add('success', 'Le devis a été modifié avec succès.');
        return $app->redirect($app['url_generator']->generate('devis'));
    }

    //On affiche par defaut le formulaire de devis rempli avec les données du devis
    return $app['twig']->render('devi_form.html.twig', array(
        'title' => 'Editer un devis',
        'deviForm' => $deviForm->createView()));
})->bind('admin_devis_edit');


// Supprimer un devis
$app->get('/admin/devis/{ref}/delete', function($ref, Request $request) use ($app) {
    // Supprimer le devis
    $app['dao.devis']->delete($ref);
    $app['session']->getFlashBag()->add('success', 'Le devis a été supprimé avec succès.');
    // Redirection sur la page des devis
    return $app->redirect($app['url_generator']->generate('devis'));
})->bind('admin_devis_delete');


// Afficher le détail d'un devis 
$app->get('/devis/{ref}', function ($ref, Request $request) use ($app) {
    $devis = $app['dao.devis']->find($ref);
    return $app['twig']->render('devi.html.twig', array(
        'devis' => $devis));
})->bind('devi');