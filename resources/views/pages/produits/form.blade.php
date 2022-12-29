@if($produit->id)
    <form  method="post" enctype="multipart/form-data" action="{{route('produit.update',['produit'=>$produit->id])}}">
    @method("patch")
@else
    <form  method="post" enctype="multipart/form-data"  action="{{route('produit.ajouter')}}" >
@endif
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="text" class="form-label" >Nom du produit</label>
                <input type="text" name="nom" class="form-control @error('text') is-invalid @enderror" value="{{$produit->nom}}">
                @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Catégorie: </label>
                <select class="form-control"name="categorie_id" required>
                    @foreach($categories as $categorie)
                        @if($categorie->id== $produit->categorie_id)
                            <option value="{{$categorie->id}}" selected>{{$categorie->nom}}</option>
                        @else
                            <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Décrivez le produit</label>
                <textarea type="text" class="form-control @error('text') is-invalid @enderror" name="details" >{{$produit->details}}</textarea>
                @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <strong>Prix du produit</strong>
                <input type="text" name="prix" class="form-control @error('numeric') is-invalid @enderror" value="{{$produit->prix}}">
                @error('numeric')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Choisir une image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="formFile" name="image" value="{{$produit->image}}" onchange="previewPicture(this)" >
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    <img src="#" alt="" id="image" style="max-width: 500px; margin-top: 20px;" >

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        
    </form>
    <script type="text/javascript" >
        var image = document.getElementById("image");
        var previewPicture  = function (e) {
            const [picture] = e.files
            if (picture) {
                image.src = URL.createObjectURL(picture)
            }
        } 
    </script>