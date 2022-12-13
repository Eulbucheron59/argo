<?php
include_once 'include/argonaute.php';

$result = getArgo($db);

$title = 'Rejoignez le Navire';
include 'layout/header.php';


?>  
  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  <form class="new-member-form" method="POST" action="index.php" onSubmit="alert('Thank you for your feedback.');">
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" />
    <button type="submit">Envoyer</button>
  </form>
  
  <!-- Member list -->
  <h2>Membres de l'équipage</h2>
  <section class="member-list">
    <?php if(empty($result)) : ?>
      <div class="member-item">Toujours à la recherche d'un équipage digne de ce nom !!</div>
    <?php else : ?>
    <?php foreach($result as $r) : ?>
     <div class="member-item"><?= $r['praenomen']."   "?> <a href="delete.php?id=<?= $r['id'] ?>">X</a></div>
    <?php endforeach ?>
    <?php endif ?>
  </section>
<?php include 'layout/footer.php'; ?>