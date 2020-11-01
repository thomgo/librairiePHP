<form action="" method="post" class="flex shortInput my-2">
  <input class="form-control" type="hidden" name="bookId" value="<?php echo $book->getB_id(); ?>">
  <input class="btn btn-danger mx-2" type="submit" name="deleteBook" value="Supprimer le livre">
</form>
