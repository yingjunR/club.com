<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Mes clubs</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Devis</th>
                <th>Description</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Stadium</th>
              </tr>
            </thead>
              <tbody>
          
          <?php foreach ($clubs as $key => $club): ?>
            <tr>
              <td><a href="<?php 
                  echo Router::url("clubs","editClub",array($club->clubid)); 
                  ?>"><?php echo $club->clubname; ?></td>
              <td><?php echo $club->devis; ?></td>
              <td><?php echo $club->description; ?></td>
              <td><?php echo $club->streetnumber; ?>
                  <?php echo $club->streetname; ?>
                  <?php echo $club->city; ?>
                  <?php echo $club->postalcode; ?>
              </td>
              <td><?php echo $club->telephone?></td>
              <td><?php echo $club->stadium?></td>

              </tr>
          
          <?php endforeach ?>
        </tbody>


            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
<!-- /.control-sidebar -->

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>