# Installation

## Utilisation de dépendances
- [Laravel Mix Tailwind](https://github.com/JeffreyWay/laravel-mix-tailwind) for using [Tailwind css](https://tailwindcss.com/docs/what-is-tailwind/). *(see he doc to install it)*
- [date-fns](https://date-fns.org/), a Modern JavaScript date utility library. *( I install with `'npm install date-fns@next --save-dev'` because of `formatRelative()`'s use )*

# utilisation de sqlite

accéder  
`sqlite3`

quiter  
`.quit`


# info Vuejs
**les props sont immutables**. Pour résoudre ce pb : 
1. on renomme la propriété  
2. on crée une data qui sera une copie de cette propriété et cette data là pourra, elle être modifiée.

## 1. renommer la propriété (nomenclature) :
dans blade 'welcome':
```js 
:data-comments {{ $comments }} //immutable 
```
 dans component:
```js
props: ['dataComments]
```
## 2. créer une data copie de props
dans component:
```js
 data() {
	return {
		comments: this.dataComments //mutable
 	}
}
```
