<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="taskA.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>Task-A</title>
  </head>
  <body>
    <style>
      #resultbox {
        height: 400px;
        width: 600px;
        word-wrap: break-word;
        resize: none;
      }
    </style>
    <script src="taskA.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <div class="container">
      <h3>Task-A Currency converter</h3>
      <div class="sub-container">
        <div class="col">
        Method: <input type="radio" name="method" value="GET" class="m-2"  checked />GET
        </div>
        <br />
        <br />
        <form id="currForm ">
        <div class="form-group" >
        <label for="currencyCode">Currency From :</label>
     <?php
                            $currXml = simplexml_load_file("../currDataXml.xml") or die("File not found!");
                            echo "<select name='from' class='form-control'  >";
                            foreach ($currXml->rates->children() as $rates) {
                              echo " <option  value='$rates->currencyName'>$rates->currencyName</option>";
                            } echo "</select>";
                            ?>

          <div class="col"> Currency to: </div>  <div class="col">  <?php
                                  $currXml = simplexml_load_file("../currDataXml.xml") or die("File not found!");
                                  echo "<select name='to' class='form-control'>";
                                  foreach ($currXml->rates->children() as $rates) {
                                    echo " <option  value='$rates->currencyName'>$rates->currencyName</option>";
                                  }echo "</select>";
                                  ?>
                                  </div>
          <br />
      </div>
      <div class="form-group">
          <label> Amount: </label>
          <input type="text" class="form-control" name="amnt" />
      </div>
          <br />
          Format:
          <input type="radio" class="m-2" name="format" value="xml" checked />XML&nbsp;<input
            type="radio"
            name="format"
            value="json"
            class="m-2" 
          />JSON
          <br />
          <br />
          <input type="button" class="btn btn-primary" value="Submit" onclick="checkMethod()" />
          <br />
          <br />
        </form>
        Result:
        <br />
        <textarea rows="4" cols="150" id="resultbox" readonly></textarea>
      </div>
    </div>
  </body>
</html>
