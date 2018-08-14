# Eleven_API
Test Technique
### Installation
* Créer une base de données mysql **planetarium**
* Cloner le projet depuis github :  https://github.com/HugoDurand/eleven_api.git
* Aller dans le dossier à l’aide d’un terminal et lancer la commande : 
```
php composer.phar install
```

### Configuration
* Ouvrir le projet avec un ide et ouvrir le fichier .env à la racine du projet
* A la ligne DATABASE_URL, rentrez ses informations de connexion à la base de données.
```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

```

* Dans le fichier phpunit.xml.dist présent à la racine, rentrez ces mêmes informations à la ligne DATABASE_URL
* Dans un terminal exécuter la commande : 
```
php bin/console make:migration
```

* puis : 
```
php bin/console doctrine:migrations:migrate
```

* Vous pouvez maintenant lancer le server : 
```
php bin/console server:run
```
 et tester les différentes routes de l’api, en ayant alimenté la base de données pour les requêtes GET.
```

 /api/planete  GET
/api/planete/{id}  GET
/api/planete  POST
/api/planete/{id}  PUT
/api/planete/{id}  DELETE
```

**En cas d’erreur SQLSTATE, remplacer localhost par 127.0.0.1 dans les données de connection**

### Tests
Le dossier Test est présent à la racine du projet.
Vous pouvez lancer les tests avec la commande :
```
./bin/phpunit
```


**Ne pas oublier de remplacer les id des requetes dans les test. Ils doivent correspondre à une ligne existante de la base de donées **




