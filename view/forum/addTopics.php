<div class="addTopic">
    <form action="index.php?ctrl=forum&action=addTopic" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Titre du sujet</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Entrez Votre titre">
        </div>
        <div class="mb-3">
            <label for="Message" class="form-label">Entrez Votre Message</label>
            <textarea name="body" class="form-control" id="Message" rows="3"
                placeholder="Entrez Votre Message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>