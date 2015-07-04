<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Combobox Relationship Table</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<script>
$(document).ready(function() {
  $("#id_semester").change(function() {
    var id_semester = $("#id_semester").val();
    $.ajax({
      type : "POST",
      url  : "<?php echo base_url('index.php/matakuliah/makul'); ?>",
      data : "id_semester=" + id_semester,
      success: function(data) {
        $("#id_matakuliah").html(data);
      }
    });
  });
});
</script>
<h4>Combobox Relationship Table</h4>
<?php echo form_open('index.php/matakuliah/input'); ?>
<?php echo validation_errors(); ?>
<table>
  <tr>
    <td>Semester</td>
    <td>
    <select name="id_semester" id="id_semester">
      <option value="">-- Pilih Semester --</option>
      <?php
      foreach ($semester as $sem) {
        echo "<option value='$sem[id_semester]' ".set_select('id_semester', $sem['id_semester']).">$sem[nama_semester]</option>"; 
      } 
      ?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mata Kuliah</td>
    <td>
    <?php
    echo "<select name='id_matakuliah' id='id_matakuliah'>";
    if(isset($_POST['id_matakuliah'])) {
      $mapel = $this->model_makul->getMakul($_POST['id_semester']);
      $data .= "<option value=''>--Pilih--</option>";
      foreach ($mapel as $mp) {
        if($mp['id_matakuliah'] == $_POST['id_matakuliah']){
          $data .= "<option value='$mp[id_matakuliah]' selected>$mp[nama_matakuliah]</option>\n";
        }
        else
        {
          $data .= "<option value='$mp[id_matakuliah]'>$mp[nama_matakuliah]</option>\n";
        }
      }
      echo $data;
    }
    else
    {
      echo "<option value=''>-- Pilih Mata Kuliah --</option>";
    }
    echo "</select>";
    ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo form_submit('submit', 'Submit'); ?>
    </td>
  </tr>
</table>
<?php echo form_close(); ?>
</body>
</html>