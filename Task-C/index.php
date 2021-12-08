<!DOCTYPE html>
<html>

<head>
  <title>Task-C Currency updater</title>
  <script src="taskC.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="../Task-A/taskA.css" />

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <style>
    #resultbox {
      height: 400px;
      width: 600px;
      word-wrap: break-word;
      resize: none;
    }
  </style>
  <div class="container">

    <h3>Task-C Currency updater</h3>
    <div class="sub-container">

      </select>
      <div class="col">
        Method:
        <input class="m-2" type="radio" name="radioMethod" value="POST" onclick="checkRadio()" checked />POST<input class="m-2" type="radio" name="radioMethod" value="PUT" onclick="checkRadio()" />PUT<input class="m-2" type="radio" name="radioMethod" value="DELETE" onclick="checkRadio()" />DELETE
      </div>


      <form id="currUpdate">
        <div class="form-group">

          <label for="currencyCode">Select Currency code:</label>
          <?php
          $currXml = simplexml_load_file("../currDataXml.xml") or die("File not found!");
          echo "<select name='currCode' class='form-control'>";
          foreach ($currXml->rates->children() as $rates) {
            echo " <option  value='$rates->currencyName'>$rates->currencyName</option>";
          }
          echo "</select>";
          ?>
        </div>
        <div class="form-group">
          <label for="currencyRate">Enter Rate :</label>
          <input type="text" id="currRateText" class='form-control' name="currRate" />
        </div>
        <div class="form-group">
          <label for="currencyRate"> Format: </label>
          <input type="radio" name="format" value="xml" checked class="m-2" />XML<input type="radio" name="format" value="json" class="m-2" />JSON
        </div>
        <div class="form-group">
          <input type="button" class="btn btn-outline-success" value="Submit" onclick="checkMethod()" />
        </div>
      </form>



      Result:
      <br />
      <textarea rows="4" cols="150" id="resultbox" readonly></textarea>
    </div>
  </div>
</body>

</html>