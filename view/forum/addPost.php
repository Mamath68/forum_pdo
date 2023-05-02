<div class="addTopic">
    <form action="index.php?ctrl=forum&action=addPost" method="post">
        <div class="mb-3">
            <label for="Topic" class="form-label">Sujet</label>
            <select class="form-select" aria-label="Default select example">
                <option selected value=" ">Chosissez Votre Sujet</option>
                <?php foreach ($topics as $topic) { ?>
                    <option value="<?= $topic->getId() ?> "><?= $topic->getTitle() ?>
                    </option>;
                <?php }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Entrez Votre Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>