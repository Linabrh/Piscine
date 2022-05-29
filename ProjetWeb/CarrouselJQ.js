$(document).ready(function () 
{
	 var $carrousel = $('#carrousel'); // on cible le bloc du carrousel
	 $img = $('#carrousel img'); // on cible les images contenues dans le carrousel
	 $p = $('#carrouselTexte p');
	 indexImg = $img.length - 1; // on définit l'index du dernier élément
	 indexP = $p.length - 1;
	 i = 0; // on initialise un compteur
	 $currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)
	 $currentP = $p.eq(i)
	 $img.css('display', 'none'); // on cache les images
	 $p.css('display','none');
	 $currentImg.css('display', 'block'); // on affiche seulement l'image courante
	 $currentP.css('display', 'block');
	 
	 //si on clique sur le bouton "Suivant"
	 $('.next').click(function () 
	 { // image suivante
		 i++; // on incrémente le compteur
		 
		 if (i <= indexImg) 
		 {
			 $img.css('display', 'none'); // on cache les images
			 $p.css('display', 'none');
			 $currentImg = $img.eq(i); // on définit la nouvelle image
			 $currentP = $p.eq(i);
			 $currentP.css('display', 'block');
			 $currentImg.css('display', 'block'); // puis on l'affiche
		 } 
		 
		 else 
		 {
			i = 0;
			$img.css('display', 'none'); // on cache les images
			$p.css('display', 'none');
			$currentImg = $img.eq(i); // on définit la nouvelle image
			$currentP = $p.eq(i);
			$currentP.css('display', 'block');
			$currentImg.css('display', 'block'); // puis on l'affiche
		 }
	 });
	 
	 //si on clique sur le bouton "Précédent"
	 $('.prev').click(function () 
	 { // image précédente
		 i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"
		 if (i >= 0) 
		 {
			$img.css('display', 'none'); // on cache les images
			$p.css('display', 'none');
			$currentImg = $img.eq(i); // on définit la nouvelle image
			$currentP = $p.eq(i);
			$currentP.css('display', 'block');
			$currentImg.css('display', 'block'); // puis on l'affiche
		 } 
		 
		 else 
		 {
			$img.css('display', 'none'); // on cache les images
			$p.css('display', 'none');
			$currentImg = $img.eq(i); // on définit la nouvelle image
			$currentP = $p.eq(i);
			$currentP.css('display', 'block');
			$currentImg.css('display', 'block'); // puis on l'affiche
		 }
	 });
	 
	/*  function slideImg() 
	 {
		 setTimeout(function () 
		 { // on utilise une fonction anonyme
		 
			 if (i < indexImg) 
			 { // si le compteur est inférieur au dernier index
				i++; // on l'incrémente
			 } 
			 
			 else 
			 { // sinon, on le remet à 0 (première image)
				i = 0;
			 }
			 
			 $img.css('display', 'none');
			 $currentImg = $img.eq(i);
			 $currentImg.css('display', 'block');
			 slideImg(); // on oublie pas de relancer la fonction à la fin
		 }, 10000); // on définit l'intervalle à 4000 millisecondes (10s)
	 }
	 slideImg(); // enfin, on lance la fonction une première fois */
	 
	 
	 
	$("#carrousel").hover(function () 
	{
		$(this).find('.next').fadeTo(200,0.75);
		$(this).find('.prev').fadeTo(200,0.75);
	},
	function () 
	{
		$(this).find('.next').fadeTo(200,0.350);
		$(this).find('.prev').fadeTo(200,0.350);
	});
 });
