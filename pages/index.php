<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KASTINZI</title>
    <link rel="stylesheet" href="global.css"> 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <!-- Modal za izmenu - MODELA pocetna stranica -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Izmena modela</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="imePrezime_modela">Ime i prezime modela:</label>
              <input type="text" class="form-control" id="imePrezime_modela" value='' required>
            </div>
            <div class="form-group">
              <label for="agencija">Agencija:</label>
              <select type="text" class="form-control" id="sudija" value='' required></select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="broj_kastinga">Broj kastinga</label>
                <!-- placeholder/value -->
                <input type="text" id="broj_kastinga" class="form-control" placeholder="0">
              </div>
            </fieldset>
            <div class="d-grid gap-2">
              <a href='./kastinziModela.php' id='sviKastinzi'><button class="btn btn-warning" style="background-color: #5D7583; font-style:italic" type="button">Svi kastinzi</button></a>
            </div>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #94A7B3;">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj" style="background-color: #7C95A2;">Sacuvaj</button>
          <button type='button' class="btn btn-danger" data-dismiss="modal" id="button_delete" style="background-color: #5D7683;">Obrisi</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal za dodavanje - MODEL pocetna stranica -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dodavanje novog modela</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            <div class="form-group">
              <label for="imePrezime_modela_dodaj">Ime i prezime modela:</label>
              <input type="text" class="form-control" id="imePrezime_modela_dodaj" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="agencija_dodaj">Agencija:</label>
              <select class="form-control" id="agencija_dodaj" placeholder="" required></select>
            </div>
            <fieldset disabled>
              <div class="form-group">
                <label for="broj_kastinga_dodaj">Broj kastinga</label>
                <!-- <select class="form-control" id="broj_kastinga_dodaj" placeholder="" required></select> -->
                <input type="text" id="broj_kastinga_dodaj" class="form-control" placeholder="0">
              </div>
            </fieldset>
          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red;">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_dodaj" style="background-color: green;">Dodaj</button>
        </div>
      </div>
    </div>
  </div>
  <?php include 'header.php'; ?>
 

<!-- SADRZAJ -->
<div class='centerDiv'>
  <div class='left_div grid-item'>
  </div>
  <div class='middle_div grid-item'>
    <div class='h_div'>
      <h1 class='h1_text'>Modeli</h1>
    </div>
    <div class='table_div table-hover'>
      <table class="table">
        <thead class="thead-red" style="background-color: pink;">
          <tr>
            <th scope="col"></th>
            <th scope="col">Model</th>
            <th scope="col">Agencija</th>
            <th scope="col">Broj kastinga</th>
          </tr>
        </thead>
        <tbody id='modeli'>


        </tbody>
      </table>
    </div>

    <!-- DUGME NOVI MODEL -->
    <div class="button_div1">
      <button data-toggle="modal" data-target="#exampleModal" type="button" data-backdrop="static"
        class="btn btn-secondary btn-lg btn-block">NOVI MODEL</button>
    </div>

  </div>

  <div class='right_div grid-item'>

  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script>
<script>
  let modeli = [];
  let agencije = [];
  let trenutniId = -1;

  $(document).ready(function () {

      ucitajModele();
      ucitajAgencije();

    // Dugme za cuvanje izmena
    $('#button_sacuvaj').click(function () {
      if (trenutniId == -1) {
        return;
      }
      const imePrezime = $('#imePrezime_modela').val();
      if(imePrezime === "") {
          alert("Morate uneti ime i prezime modela!");
          return false;
      }
      const agencija = $('#agencija').val();
      $.post('../modelHandlers/update.php', { id: trenutniId, imePrezime: imePrezime, agencija: agencija }, function (data) {
        console.log(data);
        if (data != 1) {
          alert(data);
          return;
        }
        ucitajModele();
        trenutniId = -1;
      })
    })

    // Dugme za brisanje
    $('#button_delete').click(function () {
      if (trenutniId == -1) {
        return;
      }
      $.post('../modelHandlers/delete.php', { id: trenutniId }, function (data) {
        if (data != 1) {
          alert(data);
          return;
        }
        console.log({ trenutniId: trenutniId });
        if (data == 1) {
          console.log('filter')
          modeli = modeli.filter(function (elem) { return elem.id != trenutniId });
          iscrtajTabelu();
        }

        trenutniId = -1;
      })
    })

    // Dugme za dodavanje
    $('#button_dodaj').click(function (e) {
      const imePrezime = $('#imePrezime_modela_dodaj').val();
      if(imePrezime === "") {
          alert("Morate uneti ime i prezime modela!");
          return false;
      }
      
      else {
          const sudija = $('#agencija_dodaj').val();
          $.post('../modelHandlers/add.php', { imePrezime: imePrezime, agencija: agencija }, function (data) {
          console.log(data);
          if (data != 1) {
          alert(data);
          return;
        }
        ucitajModele();
      })
      }
    })

    // Modal za dodavanje
    $('#exampleModal').on('show.bs.modal', function (e) {
      $('#agencija_dodaj').html('');
      for (let agencija of agencije) {
        $('#agencija_dodaj').append(`
          <option value='${agencija.id}'>${agencija.NazivAgencije}</option>
        `)
      }
    })

    // Modal za izmenu
    $('#exampleModal2').on('show.bs.modal', function (e) {
      const button = $(e.relatedTarget);
      const id = button.data('id');
      trenutniId = id;

      $('#agencija').html('');
      for (let agencija of agencije) {
        $('#agencija').append(`
          <option value='${agencija.id}'>${agencija.NazivAgencije}</option>
        `)
      }

      const model = modeli.find(function (elem) {
        return elem.id == id;
      });
      if (!model) {
        return;
      }
      $('#sviKastinzi').attr('href', 'kastinziModela.php?id=' + id)
      $('#agencija').val(model.agencija);
      $('#imePrezime_modela').val(model.imePrezime);
      $('#broj_kastinga').val(model.broj_kastinga);
    })

  })



  // Definicije funkcija
  function ucitajAgencije() {
    $.getJSON('../agencijaHandlers/getAll.php', function (data) {
      if (!data.status) {
        alert(data.greska);
        return;
      }
      agencije = data.agencije;
      console.log(agencije);
    })
  }

  function ucitajModele() {
    $.getJSON('../modelHandlers/getAll.php', function (data) {
      if (!data.status) {
        alert(data.greska);
        return;
      }
      console.log(data.modeli)
      modeli = data.modeli;
      iscrtajTabelu();
    })
  }

  function iscrtajTabelu() {
    $('#modeli').html('');
    let index = 1;
    for (let model of modeli) {
      $('#modeli').append(`
        <tr data-toggle="modal" data-target="#exampleModal2" data-backdrop="static" data-id=${model.id}  >
            <th scope="row">${index++}</th>
            <td>${model.imePrezime}</td>
            <td>${model.agencija_NazivAgencije}</td>
            <td>${model.broj_kastinga}</td>
          </tr>
        `)
    }
  }
</script>
</body>

</html>