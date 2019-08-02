# Commentaires différents sur plusieurs pages
> Test simple de commentaires ajoutés sur plusieurs pages par l'utilisateur.  
 On peut modifier et répondre à un commentaire.  
 Il y a une pagination définie à 3 commentaires après un reload du navigateur
# Installation

- utilisation de sqlite3
- faire 'npm install' et 'composer install'
- tester l'application : 
	> php artisan serve  
	> npm run watch

## Utilisation de dépendances
- [Laravel Mix Tailwind](https://github.com/JeffreyWay/laravel-mix-tailwind) pour utiliser [Tailwind css v.0.7.4 ](https://tailwindcss.com/docs/what-is-tailwind/) *(Voir la doc pour l'installer)*
- [date-fns](https://date-fns.org/), Une bibliothèque javascript pour formater les dates.   
( Installer avec`'npm install date-fns@next --save-dev'` pour la version qui utilise `formatRelative()` )

# Utilisation de sqlite

accéder :  
`sqlite3`

quiter :   
`.quit`

# Utilisation de Tinker
`php artisan tinker`  

Voir tous les commentaires :  
`App\Comment::all();`

Supprimer tous les commentaires :  
`DB::table('comments)->truncate();`

Supprimer un commentaire en fonction de son ID (ex ici : 6) :  
`$comment = Comment::where('id',6)->delete();`