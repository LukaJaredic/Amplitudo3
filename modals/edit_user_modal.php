<!-- Modal -->
<?php
  $countries = getCountriesFromFile();

?>
<div class="modal fade" id="editUserModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmjena korisnika</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="./update_user.php" method="POST">
          <div class="row">
              <div class="col-12">
                  <input type="text" name="first_name" id="editModalFirstName" class="form-control" placeholder="Unesite ime">
              </div>
              <div class="col-12 mt-3">
                  <input type="text" name="last_name" id="editModalLastName" class="form-control" placeholder="Unesite prezime">
              </div>
              <div class="col-12 mt-3">
                  <input type="email" name="email" id="editModalEmail" class="form-control" placeholder="Unesite e-mail adresu">
              </div>
          </div>

          <label class="mt-3" for="country">Izaberi drzavu:</label>
              <div class="col-12 mt-3">
                <select class="form-select" name="country" id="countryEdit" onchange="changed(this.value,'cityEdit')">
                  <?php
                        foreach ($countries as $country){
                            echo "<option value=".$country["id"].">".$country["name"]."</option>";
                        }
                  ?>
                </select>
              </div>

              <label class="mt-3" for="city" id = "cityEditLabel" hidden = "true">Izaberi grad:</label>
              <div class="col-12 mt-3">
                <select class="form-select" name="city" id="cityEdit" hidden = "true">
                 
                </select>
              </div>
              <input type = "hidden" name="id" id="updateUserID">
          <div class="row mt-3">
              <div class="col-4 offset-4">
                  <button class="btn btn-success w-100">Izmjeni</button>
              </div>
          </div>
      </form>

      </div>
    </div>
  </div>
</div>