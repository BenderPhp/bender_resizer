Bender Resizer
==============

__Version 0.1__


Bender Resizer utilise la librairie `image_lib` de CodeIgniter pour recadrer vos images à la volée. Resizer est un mix entre un controlleur et une librairie.

Synospys 
===


```html

<!--Raw picture
================================ -->
<img src="http://www.example.com/uploads/bender.jpg" />

<!--Resize picture 150*150
================================ -->
<img src="http://www.example.com/utilities/bender_resizer/?src=uploads/bender.jpg?width=150&height=150">

<!-- Resize picture with helper
================================ -->
<img src="<?= resizer('uploads/bender.jpg', 150, 150) ?>" />

```

Installation 
===

Pour le système de resize, il vous suffit de créer le dossier `utilities` dans le dossier `application/controllers` et d'y déposer `bender_resizer.php` 
Il vous faudra aussi créer un dossier `bender_resizer` dans le dossier `application/cache` (bender met en cache automatiquement vos images).

Pour utiliser le helper, il vous suffit d'ajouter `bender_resizer_helper.php` dans votre dossier `application/helpers` et de le charger dans CodeIgniter.

Bon code !
