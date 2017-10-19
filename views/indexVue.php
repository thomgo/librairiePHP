<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>C'est la vue de l'index</p>
    <?php echo $my_client->getProducts()[0]->getName(); ?>
  </body>
</html>
