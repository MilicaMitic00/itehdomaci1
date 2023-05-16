<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kastinzi modela</title>
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



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="naslovModala">Dodavanje novog kastinga</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <!-- sadrzaj modala -->
          <form>
            
            <div class="form-group">
              <label for="datum">Datum:</label>
              <input type="text" class="form-control" id="datum" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="nazivKastinga">Naziv kastinga:</label>
              <input type="text" class="form-control" id="nazivKastinga" placeholder="" required>
            </div>

          </form>

        </div>
        <div class="modal-footer align_center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #94A7B3;">Zatvori</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="button_sacuvaj" style="background-color: #7C95A2;">Sacuvaj</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" hidden id="button_delete" style="background-color: #5D7683;">Obrisi</button>
        </div>
      </div>
    </div>
  </div>



  <?php include 'header.php'; ?>
  <div class='centerDiv'>

    <div class='left_div grid-item'>

    </div>

    <div class='middle_div grid-item'>

      <div class='h_div'>
        <h1 class='h1_text' id='model_imePrezime'>Model: ime i prezime</h1>
        <h2 class='h1_text'>Kastinzi</h2>
      </div>

      <div class='table_div'>
        <table class="table table-hover">
          <thead class="thead-red" style="background-color: #D2CCE1 ;">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Datum</th>
              <th scope="col">NazivKastinga</th>
            </tr>
          </thead>
          <tbody id='kastinzi'>

          </tbody>
        </table>
      </div>

      <div class="button_div1">
        <button data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-id='-1' type="button"
          class="btn btn-secondary btn-lg btn-block">NOV KASTING</button>
      </div>

    </div>

    <div class='right_div grid-item'>
      <input type="text" id='modelId' value="<?php echo $_GET['id']; ?>" hidden>
      </input>
    </div>

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script>
    let model = undefined;
    let kastinzi = [];
    let trenutniKastingId = -1;

    $(document).ready(function () {

        const modelId = $('#modelId').val();
        console.log(modelId);

      $('#button_sacuvaj').click(function () {
        const datum = $('#datum').val();
        const nazivKastinga = $('#nazivKastinga').val();
        if( datum == "" || nazivKastinga == "") {
          alert("Morate popuniti sva polja!");
          return false;
        }
        if (trenutniKastingId == -1) {
          $.post('../kastingHandlers/add.php', { datum: datum, nazivKastinga: nazivKastinga, model: model.id }, function (data) {
            vratiKastinge();
          })
        } else {
          $.post('../kastingHandlers/update.php',  {
            id:trenutniKastingId,
            model:model.id,
            nazivKastinga:nazivKastinga,
            datum:datum
          } , function(data) {

            vratiKastinge();
          })
        }

      });

      $('#button_delete').click(function () {
        if (trenutniKastingId == -1) {
          return;
        }
        $.post('../kastingHandlers/delete.php', { id: trenutniKastingId }, function (data) {
            vratiKastinge();
        })
      })


      $("#exampleModal").on('show.bs.modal', function (e) {
        const tr = $(e.relatedTarget);
        trenutniKastingId = tr.data('id');
        if (trenutniKastingId == -1) {
          $('#naslovModala').html('Dodavanje novog kastinga');
          $('#button_delete').attr('hidden', true);
          $('#button_sacuvaj').attr('hidden', false);
          $('#datum').val('');
          $('#nazivKastinga').val('');
        } else {
          const kasting = kastinzi.find(function (element) { return element.id == trenutniKastingId });
          $('#naslovModala').html('Izmena kastinga');
          $('#button_delete').attr('hidden', false);
          $('#button_sacuvaj').attr('hidden', false);
          $('#datum').val(kasting.datum);
          $('#nazivKastinga').val(kasting.nazivKastinga);
        }
      })

      $.getJSON('../modelHandlers/getById.php', { id: modelId }, function (data) {
        console.log(data);
        if (data.status != 1) {
          alert(data.greska);
          // window.location.replace('./');
          return;
        }
        model = data.model;
        console.log(model);
        $('#model_imePrezime').html('Model: ' + model.imePrezime);
        vratiKastinge();
      })
    })


    function vratiKastinge() {
      $.getJSON('../kastingHandlers/getAllByModel.php', { id: model.id }, function (data) {
        if (data.status != 1) {
          alert(data.greska);
          // window.location.replace('./');
          return;
        }
        $("#kastinzi").html(data);
        kastinzi = data.kastinzi;
        kastinzi.sort(function (a, b) {
          return a.datum.localeCompare(b.datum);

        })
        napuniTabelu();
      })
    }

    function napuniTabelu() {
      $('#kastinzi').html('');
      let i = 0;
      for (let kasting of kastinzi) {
        $('#kastinzi').append(`
            <tr data-toggle='modal' data-target='#exampleModal' data-backdrop="static" data-id=${kasting.id} >
              <td>${++i}</td>
              <td>${kasting.datum}</td>
              <td>${kasting.nazivKastinga}</td>
            </tr>
          `)
      }
    }
  </script>


</body>

</html>