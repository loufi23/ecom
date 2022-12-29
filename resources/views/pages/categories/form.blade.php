<form  method="post" action="{{route('categorie.add')}}">
    <div class="modal-body">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-6 col-form-label">Nom de la Catégorie: </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nom" id="nom" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>