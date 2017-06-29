<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 30/12/2016
 * Time: 15:09
 */
class CtrlAdmin
{
    public function __construct($action)
    {
        try
        {
            switch ($action)
            {
                //Pas d'action : Réinitialisation
                case 'admin_accueil':
                    $this->AccueilAdmin();
                    break;

                //Deconnexion
                case "deconnexion":
                    $this->Deconnection();
                    break;

                //Suppression
                case "Supprimer":
                    $this->Supprimer();
                    break;

                case "Supprimer le commentaire":
                    $this->SupprimerCommentaire();
                    break;

                case "Création":
                    $this->NouvelleMusique();
                    break;

                case "ajout":
                    $this->Ajout();
                    break;

                case "Supprimer la musique":
                    $this->SupprimerMusique();
                    break;
                //Mauvaise action
                default:
                    Config::ajouterErreur("Erreur d'appel PHP");
                    Config::getVues('erreur');
                    break;
            }
        } catch (PDOException $e)
        {
            Config::ajouterErreur('Erreur BDD CtrlAdmin '.$e);
            require (Config::getVues('erreur'));
        }catch (Exception $e2)
        {
            Config::ajouterErreur('Erreur inattendue CtrlAdmin '.$e2);
            require(Config::getVues('erreur'));
        }

        //FIN
        exit(0);
    }

    //Fonctions

    // Affichage de l'accueil administrateur

    function AccueilAdmin()
    {
        $resultatToutesMusiques = Musique::toutesLesMusique();

        for ($i = 0; $i<count($resultatToutesMusiques); $i++)
        {
            $resultArtiste[$i] = Artiste::detailsArtiste($resultatToutesMusiques[$i]['id_Artiste']);
            $nbAvis[$i] = Avis::nbAvis($resultatToutesMusiques[$i]['id_Musique']);
            $resultCommentaire[$i] = Commentaire::commentaireMusique($resultatToutesMusiques[$i]['id_Musique']);
        }
        require(Config::getVues('accueilAdmin'));

    }

    //Deconnection

    function Deconnection()
    {
        MdlAdmin::deconnexion();
        require (Config::getVues('accueil'));
    }

    //Suppression
    function Supprimer()
    {
        $idMusiqueCommentaireASupprimer = Nettoyer::nettoyerString($_REQUEST['idMusique']);
        $resultatCommentaire = Commentaire::commentaireMusique($idMusiqueCommentaireASupprimer);

        require (Config::getVues('suppression'));
    }

    function SupprimerCommentaire()
    {
        $idCommentaireASupprimer = Nettoyer::nettoyerString($_REQUEST['idCommentaireASupprimer']);
        Commentaire::supprimerCommentaire($idCommentaireASupprimer);
        $this->AccueilAdmin();
    }

    function SupprimerMusique()
    {
       $idMusiqueASupprimer = Nettoyer::nettoyerString($_REQUEST['idMusiqueASupprimer']);
       Musique::delete($idMusiqueASupprimer);
       $this->AccueilAdmin();
    }

    function Ajout()
    {
        require (Config::getVues('ajout'));
    }

    function NouvelleMusique()
    {
        if (!empty($_REQUEST['titreMusique']) && !empty($_REQUEST['artiste']) && !empty($_REQUEST['dureeMusique']) && !empty($_REQUEST['cheminMusique']))
        {
            $titreMusique = Nettoyer::nettoyerString($_REQUEST['titreMusique']);
            $artiste = Nettoyer::nettoyerString($_REQUEST['artiste']);
            $dureeMusique = Nettoyer::nettoyerString($_REQUEST['dureeMusique']);
            $cheminMusique = Nettoyer::nettoyerString($_REQUEST['cheminMusique']);
            $idArtiste = Nettoyer::nettoyerString(Artiste::exist($artiste));
            Musique::nouvelleMusique($idArtiste,$titreMusique,$dureeMusique,$cheminMusique);
            $this->accueilAdmin();
        }
        else
        {
            Config::ajouterErreur("Il manque des informations pour créer la musique");
            require (Config::getVues('erreur'));
        }


    }
}