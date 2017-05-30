<section class="content-header">
  <h1>
    Modifier les informations de votre club
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                 <input type="hidden" name="clubid" value = "<?php 
                echo $club->clubid;
                ?>">

                <div class="form-group">
                  <label for="inputClubName" class="col-sm-2 control-label">Le nom de votre club</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputClubName" placeholder="Votre club ..." name="clubname" value="<?php 
                echo $club->clubname;
                ?>"">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputClubDevis" class="col-sm-2 control-label">Quelle est votre devise ?</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputClubDevis" placeholder="Icic c'est ? ..."  name="devis" value="<?php 
                echo $club->devis;
                ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Décrivez nous votre club en quelques lignes...</label>
                  <div class="col-sm-10">
                  <textarea class="resizable_textarea form-control col-md-7 col-xs-12" style="min-height: 200px;" placeholder="Votre club ..." name="description"><?php echo $club->description;?>
                  </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputClubName" class="col-sm-2 control-label">Numéro</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputStreetNumber" placeholder="Numéro..." name="streetnumber" value="<?php 
                echo $club->streetnumber;
                ?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputClubName" class="col-sm-2 control-label">Rue</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputStreetName" placeholder="Rue..." name="streetname" value="<?php 
                echo $club->streetname;
                ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputClubName" class="col-sm-2 control-label">Ville</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCity" placeholder="Ville..." name="city" value="<?php 
                echo $club->city;
                ?>">
                  </div>
                  </div>

                  <div class="form-group">
                  <label for="inputClubName" class="col-sm-2 control-label">Code postal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPostalCode" placeholder="Code Postal..." name="postalcode" value="<?php 
                echo $club->postalcode;
                ?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputClubName" class="col-sm-2 control-label">Téléphone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTelephone" placeholder="Téléphone..." name="telephone" value="<?php 
                echo $club->telephone;
                ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputClubName" class="col-sm-2 control-label">Stadium</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputStadium" placeholder="Stadium..." name="stadium" value="<?php 
                echo $club->stadium;
                ?>">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Enregistrer</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
    </div>

  </div>
</section>

