<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) 
    {
        $offname = $_POST['offname'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];
        $winname = $_POST['winnername'];
        $class = $_POST['sub'];
        $schname = $_POST['schname'];
        $mark = $_POST['mark'];
        $tammark = $_POST['tammark'];
        $tmp_name = $_FILES["image"]["tmp_name"];
        $image_name = $_FILES["image"]["name"];

        require('fpdf.php');
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->Image('123.jpg', 0, 0, 210, 297, 'JPG');

        $imageInfo = getimagesize($tmp_name);
        $imageType = $imageInfo[2];
        if ($imageType == IMAGETYPE_JPEG) {
            $pdf->Image($tmp_name, 162, 50, 30, 35, 'JPEG');//left move, right move,w,h
        } elseif ($imageType == IMAGETYPE_PNG) {
            $pdf->Image($tmp_name, 162, 50, 30, 35, 'PNG');
        }        

        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(10, 55, " ", 0, 1, 'C');
        $pdf->Cell(200, 12, "$offname", 0, 1, 'C');//left size increase
        $pdf->Cell(200, 13, "$name", 0, 1, 'C');
        $pdf->Cell(200, 13, "$address", 0, 1, 'C');
        $pdf->Cell(200, 13, "", 0, 1, 'C');
        $pdf->Cell(200, 13, "$phno", 0, 1, 'C');
        $pdf->Cell(160, 20, "$winname", 0, 1, 'R');
        
        if($class=="10th")
        {
            $pdf->Image('10.jpg', 60, 150, 15, 10, 'JPG');
        }
        else
        {      
            $pdf->Image('12.jpg', 80, 150, 15, 10, 'JPG');
        }
        $pdf->Cell(160, 13, "", 0, 1, 'R');
        $pdf->Cell(170, 20, "$schname", 0, 1, 'R');
        $pdf->Cell(160, 14, "", 0, 1, 'R');

        $pdf->Cell(66, 14, "$mark", 0, 0, 'R');
        if($class=="10th")
        {
            $pdf->Cell(20, 14, "500", 0, 0, 'R');
        }
        else
        {
            $pdf->Cell(20, 14, "600", 0, 0, 'R');
        }
        $pdf->Cell(85, 14, "$tammark", 0, 0, 'R');
        $pdf->Ln();
        $pdf->Output();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link For Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <h2>கல்வி ஊக்கப்பரிசு விண்ணப்ப படிவம்</h2>
      
      <div class="form-group fullname">
        <input type="text" id="offname" name="offname" placeholder="அச்சகத்தின் பெயர்">
      </div>

      <div class="form-group email">
        <input type="text" id="name" name="name" placeholder="உறுப்பினர் பெயர்">
      </div>

      <div class="form-group email">
        <input type="text" id="address" name="address" placeholder="முகவரி">
      </div>

      <div class="form-group email">
        <input type="text" id="phno" name="phno" placeholder="தொலைபேசி எண்">
      </div>

      <div class="form-group email">
        <input type="text" id="winnername" name="winnername" placeholder="வெற்றி பெற்ற மாணவர் / மாணவி பெயர்">
      </div>

      <div class="form-group gender">
        <select id="subject" name="sub">
          <option value="" selected disabled>வகுப்பு</option>
          <option value="10th">10th</option>
          <option value="12th">12th</option>
        </select>
      </div>

      <div class="form-group email">
        <input type="text" id="schname" name="schname" placeholder="பள்ளியின் பெயர்">
      </div>

      <div class="form-group email">
        <input type="text" id="mark" name="mark" placeholder="மதிப்பெண்">
      </div>

      <div class="form-group email">
        <input type="text" id="tammark" name="tammark" placeholder="தமிழ்பாட மதிப்பெண்">
      </div>

      <div class="form-group email">
        <input type="file" id="ph" name="image" placeholder="Upload Your Photo">
      </div>

      <div class="form-group submit-btn">
        <input type="submit" value="Get Form" name="submit">
      </div>

    </form>
  </body>
</html>