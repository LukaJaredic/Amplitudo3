<!-- Modal -->
<?php
  $countries = getCountriesFromFile();
?>




<script>

  async function changed (countryId, inputElementId) {
    const cities = await getCitiesFromDatabase(countryId);
    inflateCitySelectElement(cities,inputElementId);
  }

  function inflateCitySelectElement (cities,inputElementId) {
    let element = document.getElementById(inputElementId);
    let label = document.getElementById(inputElementId+"Label");

    if(cities.length == 0){
      hideInput(element,label);
      return;
    }

    let innerHtml = "";
    for(city of cities){
      innerHtml += `<option value=${city.id}>${city.name}</option>`;
    }
    showInput(element, label, innerHtml);
  }

  function hideInput(element, label) {
    element.hidden = true;
    label.hidden = true;
  }

  function showInput(element, label, innerHtml) {
    element.innerHTML= innerHtml;
    element.hidden = false;
    label.hidden = false;
  }

  async function getCitiesFromDatabase (countryId) {
    let res = await fetch("http://localhost/amplitudo3/api/get_cities.php?id="+countryId);
    let cities = await res.json();
    return cities;
  }
</script>



<div class="modal fade" id="newUserModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodavanje korisnika</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="./add_new_user.php" method="POST">
          <div class="row">
              <div class="col-12">
                  <input type="text" name="first_name" class="form-control" placeholder="Unesite ime">
              </div>
              <div class="col-12 mt-3">
                  <input type="text" name="last_name" class="form-control" placeholder="Unesite prezime">
              </div>
              <div class="col-12 mt-3">
                  <input type="email" name="email" class="form-control" placeholder="Unesite e-mail adresu">
              </div>
              <div class="col-12 mt-3">
                  <input type="password" name="password" class="form-control" placeholder="Unesite lozinku">
              </div>

              
              <label class="mt-3" for="country">Izaberi drzavu:</label>
              <div class="col-12 mt-3">
                <select class="form-select" name="country" id="country" onchange="changed(this.value,'city')">
                  <?php
                        foreach ($countries as $country){
                            echo "<option value=".$country["id"].">".$country["name"]."</option>";
                        }
                  ?>
                </select>
              </div>

              <label class="mt-3" for="city" id = "cityLabel" hidden = "true">Izaberi grad:</label>
              <div class="col-12 mt-3">
                <select class="form-select" name="city" id="city" hidden = "true">
                 
                </select>
              </div>
          </div>

          <div class="row mt-3">
              <div class="col-4 offset-4">
                  <button class="btn btn-success w-100">Dodaj korisnika</button>
              </div>
          </div>
      </form>

      </div>
    </div>
  </div>
</div>