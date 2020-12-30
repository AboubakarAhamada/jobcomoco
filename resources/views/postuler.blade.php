<!-- Modal -->
<!-- Ce modal contient le formulaire à remplir pour postuler à une offre -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Envoyer ma candidature au recruteur</h4>
        </div>
        <div class="modal-body">
            <form action="{{route('apply')}}" method="POST" enctype="multipart/form-data">
              @csrf

                <div class="form-group">
                    <label for="nom">Nom <span style="color:red">*</span> </label>
                    <input type="text" name="firstName" class="form-control" id="nom" required>
                </div>
                <div class="form-group">
                    <label for="nom">Prénom<span style="color:red">*</span> </label>
                    <input type="text" name="lastName" class="form-control" id="prenom" required>
                </div>
                <div class="form-group">
                    <label for="mail">Adresse mail <span style="color:red">*</span> </label>
                    <input type="email" name="email" class="form-control" id="mail" required>
                </div>
                <div class="form-group">
                  <label for="phone">Téléphone <span style="color:red">*</span> </label>
                  <input type="tel" name="phone" class="form-control" id="phone" required>
                </div>
                <div class="form-group">
                  <label for="cv">Votre CV (.pdf, docs) <span style="color:red">*</span> </label>
                  <input type="file"  name="cv_path" class="form-control" id="cv_path" required>
                </div>

                <input type="hidden" name="job_id" value="{{$job->id}}" >

                <button type="submit" class="btn btn-primary">Envoyer</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>