<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <title>Ajax JQuery Refresh Table When Inserting Row Into Database, by BrightCherry</title>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript" src="includes/js/jquery.form.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#myForm').ajaxForm({
      target: '#showdata',
      success: function() {
        $('#showdata').fadeIn('slow');
      }
    });
  });
  </script>
</head>
<body>

  <form id="myForm" action="data.php" method="post">
    <fieldset>
      <div>
        <label>First Name*:</label>
        <input type="input" name="name" maxlength="20" />
      </div>
      <div>
        <label>Surname*:</label>
        <input type="input" name="surname" maxlength="20" />
      </div>
	<div>
        <label>rut*:</label>
        <input type="input" name="rut" maxlength="20" />
      </div>
      <div>
        <input type="submit" value="Submit" />
      </div>
    </fieldset>
  </form>

  <div id="showdata">
    <?include("data.php");?>
  </div>

</body>
</html>
