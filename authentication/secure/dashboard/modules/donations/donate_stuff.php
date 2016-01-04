<?php
// Start the session
session_start();

if (!isset($_SESSION["user_type"])) {
  header("Location:../index.php");
}

?>
<!DOCTYPE html>

<html>
<head>
<meta charset="ISO-8859-1">
<title>Donate What You Want</title>
<?php 
    include "donor_header_footer.php";
    include "db_config_values.php";
?>
<script src="jquery-1.11.js">       </script>

<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<style>

    #create_donation
    {
        color: #ccc;
        text-decoration:none;
        text-align:center;
        text-shadow:0 0 5px #000;
        cursor:pointer;
    }
    #create_donation:hover
    {
        text-decoration:none;
        color:#fff;
    }
    #create_donation_div
    {
        height: 90px;
    }

    #save_btn{
        position:fixed;
        bottom:20%;
        left: 88%
    }
</style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <h1 style="text-align:center"> </h1>
                <br>
                <hr>
                <h4 style="text-align:center">Insert New Monetary Problem </h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>

            <div class="col-md-8">
                <br>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form">              
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                              <label for="usr">Stuff Name:</label>
                              <input type="text" class="form-control" id="usr" name="p_name0">
                            </div>
                            <div class="form-group">
                              <label for="usr">Category:</label><br/>
                                <select name="select_cat0">
                                  <option value="Clothes">Clothes</option>
                                  <option value="Bags">Bags</option>
                                  <option value="Shoes">Shoes</option>
                                  <option value="Furniture">Furniture</option>
                                  <option value="Electrical Equipment">Electrical Equipment</option>
                                  <option value="Household Items">Household Items</option>
                                  <option value="Stationery and books">Stationery & books</option>
                                  <option value="miscellaneous">miscellaneous</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="usr">Picture:</label><br/>
                              <img src="" style="width:100%; height:150px" id="selectedIMG0"><br/>
                              <input type="file" id="files0" name="files0" />
                            </div>                      
                        </div>
                    </div>

                    <input type="submit" name="submit" value="Save" id="save_btn" class="btn btn-primary">
                    <input type="hidden" name="donations_count" value="" id="count_donations">
                </form>
                
                <div class="col-md-1 col-md-push-5" id="create_donation_div" >
                    <a title="add new donation" style="font-size:100px;" id="create_donation">+</a>
                </div>
                <div class="col-md-12" style="height:150px"></div>
            </div>
        </div>
    </div>
    
<script>

    donations_created = 1;
    
    $(document).ready(
        function()
        {
            document.getElementById("count_donations").value=donations_created;
            $("#create_donation").click(
                function()
                {                   
                
                //alert("created");
                    
                    var newLine = document.createElement("hr");
                    $("form").append(newLine);
                    
                  var newRow = document.createElement("div");
                  newRow.setAttribute("class", "row"); 
                  $("form").append(newRow);
                  
                  var newCol1 = document.createElement("div");
                  newCol1.setAttribute("class", "col-md-8"); 
                  $(newRow).append(newCol1);
                  
                  var newCol2 = document.createElement("div");
                  newCol2.setAttribute("class", "col-md-4"); 
                  $(newRow).append(newCol2);
                    
                  var nameLabel = document.createElement("label");
                  var nameInput = document.createElement("input");
                  nameInput.setAttribute("class", "form-control"); 
                  nameInput.type="text";
                  nameLabel.setAttribute("for",nameInput);
                  nameLabel.innerHTML = "<br>Stuff Name:&nbsp&nbsp&nbsp&nbsp&nbsp <br>";
                  nameInput.name= "p_name"+donations_created;
                  $(newCol1).append(nameLabel);
                  $(newCol1).append(nameInput);
                  
                    var newLine = document.createElement("br");
                    $(newCol1).append(newLine);
                  
                  // add select element
                  var categoryLabel = document.createElement("label");
                  var categorySelect = document.createElement("select");
                  categoryLabel.innerHTML = "Category: &nbsp&nbsp&nbsp&nbsp&nbsp<br>";
                  categorySelect.name= "select_cat"+donations_created;
                  $(newCol1).append(categoryLabel);
                  
                  var newLine2 = document.createElement("br");
                  $(newCol1).append(newLine2);
                  
                  $(newCol1).append(categorySelect);
                   categoryList= ['Clothes','Bags','Shoes','Furniture','Electrical Equipment','Household Items','Stationery and books','miscellaneous'];
                   categoryLabels = new Array(8);
                   categorySelects = new Array(8);

                   for(selectOpts = 0; selectOpts<8 ; selectOpts++)
                    {
//                      alert("in for")
                      categorySelects[selectOpts] = document.createElement("option");
                      categorySelects[selectOpts].innerHTML= categoryList[selectOpts];
                      categorySelects[selectOpts].value= categoryList[selectOpts];
                      $(categorySelect).append(categorySelects[selectOpts]);
                    }

                  var picLabel = document.createElement("label");
                  var pic = document.createElement("img");
                  pic.style.width = "100%";
                  pic.style.height="150px";
                  pic.src=""
                  var picInput = document.createElement("input");
                  picInput.type="file";
                  picLabel.setAttribute("for",picInput);
                  
                  picLabel.setAttribute("id", "files"+donations_created);
                  pic.setAttribute("id", "selectedIMG"+donations_created);
                  
                  picLabel.innerHTML = "<br>Picture:&nbsp&nbsp&nbsp&nbsp&nbsp <br>";
                  picInput.name= "files"+donations_created;
                  $(newCol2).append(picLabel);
                  var newLine3 = document.createElement("br");
                  $(newCol2).append(newLine3);
                  $(newCol2).append(pic);
                  $(newCol2).append(picInput);                  
                    

                  donations_created++;
                  document.getElementById("count_donations").value=donations_created;
                }
            );
        }
    );
        
</script>
    
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $total_donations = $_POST["donations_count"];

    $user_email = $_SESSION["user_email_"];
    $user_f_name = $_SESSION["user_first_name_"];
    $user_l_name = $_SESSION["user_last_name_"];
    
    $error = 0;
    $not_reserved = "";

    $empty_names=0;
    for ($finding_empty=0; $finding_empty < $total_donations; $finding_empty++) { 
      if ($_POST["p_name".$finding_empty] == "" || !isset($_POST["p_name".$finding_empty])) {
        # code...
        $empty_names++;
      }
    }

  if ($empty_names == 0)  {
    # code...
      for($ii=0 ; $ii<$total_donations ; $ii++)
      {
          $name = filter_var($_POST["p_name".$ii], FILTER_SANITIZE_STRING); 
          $category = $_POST["select_cat".$ii];
          $pic = "pics/" .$_POST["files".$ii];


          $sql = "insert into metirial_donation( metirial_name, category, picture) values ('$name','$category', '$pic') ";
          $result = $conn->query($sql);       
          
          //echo "<script> alert('Incorrect Name or Password Entered') </script>";
          
          $sql_1 = "SELECT max(`metirial_id`) as maxim FROM `metirial_donation`";
          $result_1 = $conn->query($sql_1);       
          $row = $result_1->fetch_assoc();
          $metirial_id_ = $row["maxim"];
          
          
          //echo "<script> alert(".$user_f_name.") </script>";
          
          $sql2 = "insert into metirial_donation_user( metirial_id, user_first_name, user_last_name,user_email) values ($metirial_id_,'$user_f_name','$user_l_name', '$user_email') ";
          
          if ($result === TRUE && $conn->query($sql2) === TRUE ){
          echo "New record created successfully. Last inserted ID is: " .$conn->insert_id;
          } else {
              $not_reserved.= "$name,";
  //          echo "Error: " . $sql2 . "<br><br><br><br>" . $conn->error;
          }

      }
  }

    else {
      echo "<script> alert('Fill in the fields') </script>";
    }

    if ($not_reserved != "" ) {
        echo "<script> alert('Error inserting ".$not_reserved." . Other items inserted successfully') </script>";
    }
    else if ($not_reserved = "" && $empty_names==0) {
      # code...
      echo "<script> alert('items inserted successfully') </script>";
    }
      


    $conn->close();
}
?>

<script> 
  function handleFileSelect(evt) {
      
     
      
    var files = evt.target.files; // FileList object
    var f;
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
        var imgSelected = document.getElementById("selectedIMG0");
        imgSelected.src= e.target.result;
        
     //alert("src: "+imgSelected);  
        
        imgSelected.value= e.target.result;
        //document.getElementById('list').insertBefore(imgSelected, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }
  
 </script>

 
    <script>
        $(document).ready(
            function()
            {
                document.getElementById("donate_stuff").className = "active";
  
 for(adding_event=0 ; adding_event<donations_created ; adding_event++)
     
    document.getElementById("files"+adding_event).addEventListener('change', handleFileSelect);
            }
        )
    </script>

 
 
</body>
</html>