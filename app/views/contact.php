<?php /*
***************************************************
***************************************************
***************** VIEW / CONTACT ******************
***************************************************
***************************************************
*/ ?>

<section class="background">

	<span class="anchor" id="contact"></span>

	<div class="contenu">
		<div class="contact">
			<h2>Me contacter :</h2>

			<?php if($send != null){
				echo "<p><strong>".$send."</strong></p>";
			} ?>

			<form method="post" action="./app/controller/post_contact.php">

				<input type="text"  name="name" placeholder="Nom et Prénom" required/>
				<input type="email" name="email" id="email" placeholder="email@domaine.com" required/>
				<textarea name="message" placeholder="Votre message" required/></textarea>
				<input class="button" type="submit" value="Envoyer">
				
			</form>

		</div>
	</div>
</section>