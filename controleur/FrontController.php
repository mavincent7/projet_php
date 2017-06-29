<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 30/12/2016
 * Time: 15:09
 */
class FrontController
{

    public function __construct()
    {
        session_start();
        //Liste des actions utilisateur
        $listeActionUtilisateur = array('NULL', 'Commenter', 'Négatif', 'Indifférent', 'Positif', 'Détails','identification','Connexion' );

        // Liste des action administrateur
        $listeActionAdmin = array('admin_accueil',"Supprimer la musique",'deconnexion','Supprimer',"Supprimer le commentaire","ajout","Création");

        try {
            if(isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            }
            else {
                $action = 'NULL';
            }

            //Appel du controller utilisateur ou admin en fonction d'où est située l'action dans les listes
            switch ($action) {
                case in_array($action, $listeActionUtilisateur):
                    $ctrlUtilisateur = new CtrlUtilisateur($action);
                    break;
                case in_array($action, $listeActionAdmin):
                    if(MdlAdmin::isAdmin() != NULL) {
                        $ctrlAdmin = new CtrlAdmin($action);
                    }
                    else {
                        $ctrlUtilisateur = new CtrlUtilisateur('Connexion');
                    }
                    break;
                default:
                    Config::ajouterErreur("Erreur d'appel PHP frontCtrl");
                    Config::getVues('erreur');
                    break;
            }
        }
        catch (PDOException $ePDO)
        {
            Config::ajouterErreur('Erreur BDD frontCtrl'.$ePDO);
            Config::getVues('erreur');
        }
        catch (Exception $e) {
            Config::ajouterErreur('Erreur inattendue frontCtrl');
            Config::getVues('erreur');
        }
    }
}