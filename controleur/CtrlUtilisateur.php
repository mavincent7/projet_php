<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 29/12/2016
 * Time: 12:24
 */
class CtrlUtilisateur
{
    public function __construct($action)
    {
        try
        {
            switch ($action)
            {
                case 'NULL':
                    $this->Accueil();
                    break;

                //Commenter
                case "Commenter":
                    $this->Commenter();
                    break;

                //Avis positif
                case "Positif":
                    $this->AvisP();
                    break;

                //Avis indifférent
                case "Indifférent":
                    $this->AvisIndif();
                    break;

                //Avis négatif
                case "Négatif":
                    $this->AvisN();
                    break;

                //Détails d'une musique
                case "Détails":
                    $this->detailsMusique();
                    break;

                case "identification" :
                    $this->Identification();
                    break;

                case "Connexion" :
                    $this->Connexion();
                    break;


                //Mauvaise action
                default:
                    echo $_REQUEST['action'];
                    Config::ajouterErreur("Erreur d'appel PHP CtrlUtilisateur");
                    require(Config::getVues('erreur'));
                    break;
            }
        } catch (PDOException $e)
        {
            Config::ajouterErreur('Erreur BDD CtrlUtilisateur'."$e");
            require(Config::getVues('erreur'));
        }catch (Exception $e2)
        {
            Config::ajouterErreur('Erreur inattendue');
            require(Config::getVues('erreur'));
        }

        //FIN
        exit(0);
    }

    //FONCTION

    function Accueil()
    {
        $resultatToutesMusiques = Musique::toutesLesMusique();

        for ($i = 0; $i<count($resultatToutesMusiques); $i++)
        {
            $resultArtiste[$i] = Artiste::detailsArtiste($resultatToutesMusiques[$i]['id_Artiste']);
            $nbAvis[$i] = Avis::nbAvis($resultatToutesMusiques[$i]['id_Musique']);
            $resultCommentaire[$i] = Commentaire::commentaireMusique($resultatToutesMusiques[$i]['id_Musique']);
        }
        require(Config::getVues('accueil'));

    }

    /**
     * Ajouter un commentaire
     */
    function Commenter()
    {
        $text = Nettoyer::nettoyerString($_REQUEST['textCommentaire']);
        $idMusique = Nettoyer::nettoyerString($_REQUEST['idMusique']);
        Commentaire::ajouterCommentaire($text,$idMusique);
        $this->Accueil();
    }

    /**
     * Ajouter un avis positif
     */
    function AvisP()
    {
        $type = "P";
        $idMusique = Nettoyer::nettoyerString($_REQUEST['idMusique']);
        Avis::ajouterAvis($type,$idMusique);
        $this->Accueil();
    }

    /**
     * Ajouter un avis indiférent
     */
    function AvisIndif()
    {
        $type = "I";
        $idMusique = Nettoyer::nettoyerString($_REQUEST['idMusique']);
        Avis::ajouterAvis($type,$idMusique);
        $this->Accueil();
    }

    /**
     * Ajouter un avis négatif
     */
    function AvisN()
    {
        $type = "N";
        $idMusique = Nettoyer::nettoyerString($_REQUEST['idMusique']);
        Avis::ajouterAvis($type,$idMusique);
        $this->Accueil();
    }

    /**
     * Détail d'une musique
     */
    function detailsMusique()
    {
        $idMusiqueDetails = Nettoyer::nettoyerString($_REQUEST['idMusique']);
        $resultatsMusique = Musique::detailsMusique($idMusiqueDetails);
        $resultatsArtiste = Artiste::detailsArtiste($resultatsMusique[0]['id_Artiste']);

        $resultatsAlbum = Album::detailsAlbum($resultatsMusique[0]['id_Album']);
        if($resultatsMusique[0]['id_Album'] == NULL)
        {
            $resultatsAlbum[0]['Annee_Parution'] = "Pas défini";
            $resultatsAlbum[0]['Titre'] = "Pas défini";
            $resultatsAlbum[0]['Couverture'] = 'images/pochette.png';
        }
        require (Config::getVues('details'));
    }

    //Connection

    function Connexion()
    {
       if(isset($_REQUEST['login']) && isset($_REQUEST['mdp']))
       {
           $login = Nettoyer::nettoyerString($_REQUEST['login']);
           $mdp = Nettoyer::nettoyerString($_REQUEST['mdp']);

           $resCo = Utilisateur::seConnecter($login,$mdp);
           if($resCo != NULL)
           {
               require (Config::getVues('succes'));
           }
           else
           {
               require (Config::getVues('identification'));
           }
       }
       else
       {
           require(Config::getVues('identification'));
       }
    }

    //Identification

    function Identification()
    {
        require (Config::getVues('identification'));
    }


}